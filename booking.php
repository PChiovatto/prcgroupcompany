<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Book an Appointment | ' . BUSINESS_NAME;
$pageDesc  = 'Schedule your free painting, carpentry or remodeling consultation with ' . BUSINESS_NAME . '. Pick a date and time — we\'ll confirm by email.';
$canonical = SITE_URL . '/booking.php';
$active    = 'booking';
$extraCSS  = ['css/booking.css'];
$extraJS   = ['js/booking.js'];
include __DIR__ . '/includes/header.php';
?>

  <section class="book-hero">
    <div class="container">
      <h1>Book Your Free Consultation</h1>
      <p>Pick a date and time that works for you. We'll confirm your appointment by email and
        call to finalize the details.</p>
    </div>
  </section>

  <section class="section">
    <div class="container">

      <div id="bookingView">
        <div class="booking">

          <div class="cal">
            <div class="cal__head">
              <div class="cal__title" id="calTitle">Month</div>
              <div class="cal__nav">
                <button type="button" id="calPrev" aria-label="Previous month">‹</button>
                <button type="button" id="calNext" aria-label="Next month">›</button>
              </div>
            </div>
            <div class="cal__grid" id="calGrid"></div>
            <div class="cal__legend">
              <span><i style="background:var(--navy)"></i> Selected</span>
              <span><i style="box-shadow:inset 0 0 0 2px var(--amber);background:#fff"></i> Today</span>
              <span><i style="background:#f3f4f6"></i> Closed</span>
            </div>
          </div>

          <div class="bpanel">
            <h3>Choose date &amp; time</h3>
            <p class="sub"><?= BUSINESS_HOURS ?>. Sundays closed.</p>

            <div class="bsel empty" id="bSel">Select a date to see available times.</div>

            <div id="slotsWrap" class="is-hidden">
              <div class="slots" id="slots"></div>
            </div>

            <form class="bform" id="bookForm" novalidate>
              <div class="field">
                <label for="bservice">Service</label>
                <select id="bservice" name="service">
                  <option>Interior Painting</option>
                  <option>Exterior Painting</option>
                  <option>General Carpentry</option>
                  <option>Finish Carpentry</option>
                  <option>Home Remodeling</option>
                  <option>Other / Not sure</option>
                </select>
              </div>
              <div class="field">
                <label for="bname">Full name</label>
                <input type="text" id="bname" name="name" required placeholder="Your name" />
              </div>
              <div class="brow">
                <div class="field">
                  <label for="bphone">Phone</label>
                  <input type="tel" id="bphone" name="phone" required placeholder="<?= BUSINESS_PHONE ?>" />
                </div>
                <div class="field">
                  <label for="bemail">Email</label>
                  <input type="email" id="bemail" name="email" required placeholder="you@email.com" />
                </div>
              </div>
              <div class="field">
                <label for="bnotes">Notes (optional)</label>
                <textarea id="bnotes" name="notes" rows="2" placeholder="Address, project details…"></textarea>
              </div>
              <button type="submit" class="btn btn--primary btn--full">Confirm booking</button>
              <p class="bnote" id="bookNote"></p>
            </form>
          </div>

        </div>
      </div>

      <div id="successView" class="is-hidden">
        <div class="booked">
          <div class="booked__check">✓</div>
          <h3>Appointment requested!</h3>
          <p>Thanks — we've received your request and will email you a confirmation shortly.</p>
          <div class="booked__card">
            <div><span>Name</span><span id="sumName"></span></div>
            <div><span>Service</span><span id="sumService"></span></div>
            <div><span>Date</span><span id="sumDate"></span></div>
            <div><span>Time</span><span id="sumTime"></span></div>
          </div>
          <a href="index.php" class="btn btn--primary">Back to home</a>
        </div>
      </div>

    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
