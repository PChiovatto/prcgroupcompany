<?php
/**
 * Unified form handler for PRC Group.
 * Handles contact, quote-calculator and booking submissions, sends email
 * server-side, and returns JSON. Called via fetch() from the site JS.
 */

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/mailer.php';

header('Content-Type: application/json; charset=UTF-8');

function out($ok, $msg = '') {
    echo json_encode(['success' => $ok, 'message' => $msg]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    out(false, 'Method not allowed.');
}

// Honeypot — silently accept bots without emailing.
if (!empty($_POST['botcheck'])) {
    out(true);
}

$type    = $_POST['form']    ?? 'contact';
$name    = trim($_POST['name']    ?? '');
$phone   = trim($_POST['phone']   ?? '');
$email   = trim($_POST['email']   ?? '');
$address = trim($_POST['address'] ?? '');
$service = trim($_POST['service'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $phone === '') {
    http_response_code(422);
    out(false, 'Please provide at least your name and phone number.');
}

$replyTo = filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : null;
$lines   = [];
$subject = '';

if ($type === 'quote') {
    $project  = trim($_POST['project']  ?? '');
    $finish   = trim($_POST['finish']   ?? '');
    $estimate = trim($_POST['estimate'] ?? '');
    $subject  = 'New quote request — ' . $service;
    $lines = [
        'NEW INSTANT QUOTE REQUEST',
        '=========================',
        'Service:   ' . $service,
        'Project:   ' . $project,
        'Finish:    ' . $finish,
        'Estimate:  ' . $estimate,
        '',
        'Name:      ' . $name,
        'Phone:     ' . $phone,
        'Email:     ' . ($email ?: '—'),
        'Address:   ' . ($address ?: '—'),
        'Notes:     ' . ($message ?: '—'),
    ];
} elseif ($type === 'booking') {
    $date = trim($_POST['date'] ?? '');
    $time = trim($_POST['time'] ?? '');
    if ($date === '' || $time === '') {
        http_response_code(422);
        out(false, 'Please choose a date and time.');
    }
    $subject = 'New booking — ' . $date . ' at ' . $time;
    $lines = [
        'NEW APPOINTMENT REQUEST',
        '=======================',
        'Date:     ' . $date,
        'Time:     ' . $time,
        'Service:  ' . ($service ?: '—'),
        '',
        'Name:     ' . $name,
        'Phone:    ' . $phone,
        'Email:    ' . ($email ?: '—'),
        'Address:  ' . ($address ?: '—'),
        'Notes:    ' . ($message ?: '—'),
    ];
} else {
    $subject = 'New contact message from the website';
    $lines = [
        'NEW CONTACT REQUEST',
        '===================',
        'Service:  ' . ($service ?: '—'),
        '',
        'Name:     ' . $name,
        'Phone:    ' . $phone,
        'Email:    ' . ($email ?: '—'),
        'Address:  ' . ($address ?: '—'),
        'Message:  ' . ($message ?: '—'),
    ];
}

$sent = send_mail(BUSINESS_EMAIL, $subject, $lines, $replyTo);

if (!$sent) {
    http_response_code(500);
    out(false, 'We could not send your request right now. Please call ' . BUSINESS_PHONE . '.');
}

// Optional confirmation email to the customer (bookings only).
if ($type === 'booking' && SEND_AUTOREPLY && $replyTo) {
    $confirm = [
        'Hi ' . $name . ',',
        '',
        'Thanks for booking with ' . BUSINESS_NAME . '. We received your request:',
        '',
        '  Date:    ' . ($_POST['date'] ?? ''),
        '  Time:    ' . ($_POST['time'] ?? ''),
        '  Service: ' . ($service ?: '—'),
        '',
        'We will call you shortly to confirm the details.',
        '',
        BUSINESS_NAME . ' — ' . BUSINESS_PHONE,
    ];
    send_mail($replyTo, 'Your booking with ' . BUSINESS_NAME, $confirm);
}

out(true, 'Thanks! Your request has been sent.');
