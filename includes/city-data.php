<?php
/**
 * PRC Group — city pages data.
 * Every city gets UNIQUE copy: intro, neighborhoods, housing notes and a
 * localized FAQ answer, so no two pages read the same.
 */

$CITIES = [

  'wakefield' => [
    'hero' => 'split', 'body' => 'list', 'img' => 'assets/projects/interior-painting-repaint-massachusetts.jpg',
    'name'  => 'Wakefield',
    'drive' => 'Our home base',
    'intro' => 'Wakefield is home — our shop is right on Albion Street. From Greenwood to the shores
      of Lake Quannapowitt, we\'ve painted, repaired and remodeled homes in every corner of town,
      and there\'s no faster address for us to reach.',
    'neighborhoods' => ['Greenwood', 'Lakeside', 'Montrose', 'Downtown / Albion St', 'West Side'],
    'housing' => 'Wakefield\'s mix of Victorians near the lake, Greenwood capes and post-war
      colonials keeps our crews busy with everything from full exterior repaints to kitchen
      updates and deck rebuilds.',
    'faq_local_q' => 'Do you really work out of Wakefield?',
    'faq_local_a' => 'Yes — 86 Albion St. When you hire us you\'re hiring a local crew your
      neighbors already use, not a franchise dispatching from another county.',
  ],

  'winchester' => [
    'hero' => 'bigtype', 'body' => 'list', 'img' => '',
    'name'  => 'Winchester',
    'drive' => '± 15 min from our Wakefield shop',
    'intro' => 'Winchester\'s grand Victorians and center-entrance colonials deserve better than a
      rushed paint job. We bring the careful prep, color sense and finish carpentry these homes
      were built with — from Wedgemere to Myopia Hill.',
    'neighborhoods' => ['Wedgemere', 'Myopia Hill', 'Symmes Corner', 'The Flats', 'Winchester Center'],
    'housing' => 'Expect us to be comfortable with high gables, ornate trim, plaster walls and the
      detail work that older high-end homes demand — that\'s most of what we do in Winchester.',
    'faq_local_q' => 'Can you handle large or historic Winchester homes?',
    'faq_local_a' => 'Yes. Tall Victorians, plaster repair, custom trim reproduction and
      multi-week exterior projects are exactly the work our carpenters and painters specialize in.',
  ],

  'lynnfield' => [
    'hero' => 'gradient', 'body' => 'grid', 'img' => '',
    'name'  => 'Lynnfield',
    'drive' => '± 10 min from our Wakefield shop',
    'intro' => 'Right next door to our Wakefield shop, Lynnfield is one of our most active towns.
      From established streets around Pillings Pond to newer construction near MarketStreet, we
      keep Lynnfield homes painted, trimmed and updated.',
    'neighborhoods' => ['South Lynnfield', 'Pillings Pond', 'Lynnfield Center', 'Apple Hill', 'King James Grant'],
    'housing' => 'Lynnfield\'s larger colonials and newer builds mean big exterior repaints,
      cabinet refinishing and finish-carpentry upgrades — and our proximity means quick
      scheduling and easy follow-ups.',
    'faq_local_q' => 'How quickly can you get to a Lynnfield project?',
    'faq_local_a' => 'We\'re about ten minutes away. Estimates usually happen within a couple of
      days, and staying close by makes multi-phase projects and touch-ups painless.',
  ],

  'reading' => [
    'hero' => 'photo', 'body' => 'cols3', 'img' => 'assets/projects/exterior-siding-painting-massachusetts.jpg',
    'name'  => 'Reading',
    'drive' => '± 10 min from our Wakefield shop',
    'intro' => 'Reading\'s classic colonials and capes are our bread and butter. We\'re ten minutes
      up Route 28, and homeowners from Birch Meadow to the West Side call us for crisp exterior
      repaints, interior refreshes and carpentry done right.',
    'neighborhoods' => ['West Side', 'Birch Meadow', 'Downtown Reading', 'Killam', 'Wood End'],
    'housing' => 'Many Reading homes date from the early-to-mid 1900s — which means real wood
      siding, real trim and real prep. We scrape, prime and repair before any paint goes on.',
    'faq_local_q' => 'Do you do both the carpentry repairs and the painting in Reading?',
    'faq_local_a' => 'Yes — one crew, one schedule. Rotted clapboards, damaged trim and the
      finish coat are all handled in the same project.',
  ],

  'north-reading' => [
    'hero' => 'gradient', 'body' => 'list', 'img' => '',
    'name'  => 'North Reading',
    'drive' => '± 15 min from our Wakefield shop',
    'intro' => 'From Martins Pond to Park Colony, North Reading homeowners use PRC Group for the
      projects that keep a house feeling new — full repaints, deck rebuilds, trim upgrades and
      bathroom refreshes.',
    'neighborhoods' => ['Martins Pond', 'Park Colony', 'West Village', 'North Reading Center'],
    'housing' => 'North Reading\'s ranches, splits and newer colonials are ideal candidates for
      cabinet refinishing, LVP flooring and open-concept updates — remodeling work we manage
      end to end.',
    'faq_local_q' => 'Do you take on smaller North Reading jobs, like one room or a deck?',
    'faq_local_a' => 'Absolutely. Single rooms, decks and punch lists are a normal part of our
      week — and they\'re often how North Reading clients try us out before a bigger project.',
  ],

  'melrose' => [
    'hero' => 'photo', 'body' => 'grid', 'img' => 'assets/projects/custom-trim-wainscoting-carpentry-massachusetts.jpg',
    'name'  => 'Melrose',
    'drive' => '± 10 min from our Wakefield shop',
    'intro' => 'Melrose might be the most paint-intensive town we serve — street after street of
      Victorians with detailed trim, porches and gables. We\'re next door in Wakefield, and this
      is exactly the work we love.',
    'neighborhoods' => ['Bellevue', 'Wyoming Hill', 'Horace Mann', 'Melrose Highlands', 'Cedar Park'],
    'housing' => 'Multi-color Victorian exteriors, porch restorations and plaster-wall interiors
      are Melrose staples. Our painters and finish carpenters work together so the details
      come out right.',
    'faq_local_q' => 'Can you do a multi-color Victorian exterior in Melrose?',
    'faq_local_a' => 'Yes — body, trim and accent schemes are a specialty. We\'ll sample colors on
      your house and detail the scheme in the written estimate.',
  ],

  'stoneham' => [
    'hero' => 'split', 'body' => 'grid', 'img' => 'assets/projects/deck-construction-carpentry-massachusetts.jpg',
    'name'  => 'Stoneham',
    'drive' => '± 10 min from our Wakefield shop',
    'intro' => 'Stoneham borders our home town, and from Bear Hill to Colonial Park we handle the
      full range — exterior repaints, kitchen and bath updates, decks and the repairs New England
      weather makes inevitable.',
    'neighborhoods' => ['Bear Hill', 'Colonial Park', 'Spot Pond area', 'Farm Hill', 'Stoneham Square'],
    'housing' => 'Stoneham\'s capes, colonials and split-levels respond beautifully to fresh
      exterior color, updated trim and modernized kitchens — our three core trades in one team.',
    'faq_local_q' => 'How soon can you start a Stoneham project?',
    'faq_local_a' => 'Estimates within days — we\'re ten minutes away. Start dates depend on season
      and scope, and your written proposal includes a realistic schedule.',
  ],

  'lexington' => [
    'hero' => 'bigtype', 'body' => 'cols3', 'img' => '',
    'name'  => 'Lexington',
    'drive' => '± 25 min from our Wakefield shop',
    'intro' => 'Lexington homeowners invest in their homes — and expect craftsmanship in return.
      From historic houses near the Battle Green to renovated colonials on Follen Hill, we
      deliver museum-quality prep, paint and trim.',
    'neighborhoods' => ['Lexington Center', 'Follen Hill', 'Meriam Hill', 'East Lexington', 'Peacock Farm'],
    'housing' => 'The mix runs from antique homes requiring careful, lead-safe restoration to
      mid-century moderns and large renovated colonials — each getting the right materials
      and methods.',
    'faq_local_q' => 'Are you equipped for Lexington\'s older and historic homes?',
    'faq_local_a' => 'Yes — EPA lead-safe practices on pre-1978 homes, trim profile matching, and
      the patience real restoration work requires.',
  ],

  'andover' => [
    'hero' => 'photo', 'body' => 'list', 'img' => 'assets/projects/kitchen-remodel-cabinets-countertop-massachusetts.jpg',
    'name'  => 'Andover',
    'drive' => '± 25 min from our Wakefield shop',
    'intro' => 'From In-Town streets near Phillips Academy to Shawsheen Village and the newer
      neighborhoods off River Road, PRC Group brings Andover homes the full package — painting,
      carpentry and remodeling from one accountable crew.',
    'neighborhoods' => ['In-Town / Academy area', 'Shawsheen Village', 'Ballardvale', 'West Andover', 'South Andover'],
    'housing' => 'Andover\'s large colonials mean serious exterior square footage and generous
      interiors — projects where our one-team approach saves weeks versus juggling separate
      painters and carpenters.',
    'faq_local_q' => 'Do you handle large whole-house projects in Andover?',
    'faq_local_a' => 'Yes — whole-house repaints and multi-room renovations are core work. You get
      an itemized proposal, a realistic timeline and one point of contact throughout.',
  ],

  'marblehead' => [
    'hero' => 'split', 'body' => 'cols3', 'img' => 'assets/projects/bathroom-renovation-remodeling-massachusetts.jpg',
    'name'  => 'Marblehead',
    'drive' => '± 25 min from our Wakefield shop',
    'intro' => 'Salt air is merciless on paint — and nowhere more than Marblehead. From antique
      homes in Old Town to shingled houses on the Neck, we prep and coat exteriors to stand up
      to the ocean, and restore the interiors to match.',
    'neighborhoods' => ['Old Town', 'Marblehead Neck', 'Clifton', 'Shipyard', 'Village area'],
    'housing' => 'Pre-1900 housing stock, ocean exposure and historic detail make Marblehead
      demanding — and rewarding. Expect thorough scraping, marine-grade prep and trim
      carpentry that respects the original work.',
    'faq_local_q' => 'How do you make exterior paint last near the ocean?',
    'faq_local_a' => 'Aggressive prep, the right primers, and 100% acrylic topcoats applied in the
      correct conditions. We also repair rot and flashing issues first, so the coating has
      something sound to hold onto.',
  ],

  'swampscott' => [
    'hero' => 'gradient', 'body' => 'cols3', 'img' => '',
    'name'  => 'Swampscott',
    'drive' => '± 20 min from our Wakefield shop',
    'intro' => 'Swampscott\'s coastal Victorians and shingle-style homes take a beating from wind
      and salt. We keep them protected and beautiful — exterior repaints, porch repairs and
      interior updates from Vinnin Square to Phillips Beach.',
    'neighborhoods' => ['Olmsted Historic District', 'Phillips Beach', 'Vinnin Square', 'Beach Bluff'],
    'housing' => 'Like its neighbor Marblehead, Swampscott demands coastal-grade prep and
      materials. Victorian trim, porches and plaster interiors are all familiar territory
      for our crew.',
    'faq_local_q' => 'Do you work in Swampscott\'s historic Olmsted district?',
    'faq_local_a' => 'Yes — we\'re comfortable with the detail, color schemes and care that
      historic-district homes call for, and we use lead-safe practices on older houses.',
  ],

  'woburn' => [
    'hero' => 'bigtype', 'body' => 'grid', 'img' => '',
    'name'  => 'Woburn',
    'drive' => '± 15 min from our Wakefield shop',
    'intro' => 'Woburn homeowners want honest pricing and solid work — exactly how we built our
      name. From Horn Pond to the West Side we deliver exterior repaints, kitchen updates,
      decks and repairs without the runaround.',
    'neighborhoods' => ['West Side', 'Horn Pond area', 'Montvale', 'North Woburn', 'Central Square'],
    'housing' => 'Woburn\'s capes, splits and two-families are practical houses that benefit most
      from durable finishes and smart updates — we\'ll tell you where the money matters and
      where it doesn\'t.',
    'faq_local_q' => 'Do you paint two-family homes and rental properties in Woburn?',
    'faq_local_a' => 'Yes — including fast, clean turnovers between tenants. Landlords get the
      same written scope and warranty as owner-occupants.',
  ],

];
