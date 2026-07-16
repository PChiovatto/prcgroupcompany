<?php
require_once __DIR__ . '/includes/config.php';
$active  = 'home';
$extraJS = ['js/main.js'];
include __DIR__ . '/includes/header.php';
?>

  <!-- ===== HERO ===== -->
  <section class="hero" id="home">
    <div class="hero__overlay"></div>
    <div class="container hero__content">
      <span class="hero__eyebrow">Licensed &amp; Insured · 5★ Rated</span>
      <h1>Painting, Carpentry &amp; Home Remodeling<br />in <?= BUSINESS_AREA ?></h1>
      <p>From a single accent wall to a full home renovation — <?= BUSINESS_NAME ?> brings craftsmanship,
        clean work and on-time delivery to every project across <?= BUSINESS_AREA ?>.</p>
      <div class="hero__actions">
        <a href="#contact" class="btn btn--primary">Get Your Free Estimate</a>
        <a href="tools.php#calc-section" class="btn btn--ghost">Instant Quote</a>
      </div>
      <div class="hero__stats">
        <div><strong><?= date('Y') - BUSINESS_FOUNDED ?>+</strong><span>Years in business</span></div>
        <div><strong>500+</strong><span>Projects completed</span></div>
        <div><strong>100%</strong><span>Satisfaction focus</span></div>
      </div>
    </div>
  </section>

  <!-- ===== TRUST STRIP ===== -->
  <div class="trust">
    <div class="container trust__inner">
      <span>✔ Licensed &amp; Insured</span>
      <span>✔ Free Written Estimates</span>
      <span>✔ Clean &amp; Respectful Crews</span>
      <span>✔ Workmanship Warranty</span>
    </div>
  </div>

  <!-- ===== SERVICES ===== -->
  <section class="section" id="services">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">What We Do</span>
        <h2>Our Services</h2>
        <p>One trusted team for the whole job — interior and exterior painting, carpentry, and
          complete remodeling.</p>
      </div>
      <div class="cards">
        <article class="card">
          <h3><a href="interior-painting.php" class="card__title-link">Interior Painting</a></h3>
          <p>Walls, ceilings, trim and cabinets finished with premium paints, sharp lines and
            full surface prep — minimal disruption to your home.</p>
          <a href="interior-painting.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="exterior-painting.php" class="card__title-link">Exterior Painting</a></h3>
          <p>Siding, decks, fences and doors protected against New England weather with proper
            prep, priming and durable coatings.</p>
          <a href="exterior-painting.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="general-carpentry.php" class="card__title-link">General Carpentry</a></h3>
          <p>Framing, repairs, decks, doors, siding and structural fixes — solid, code-conscious
            carpentry by experienced builders.</p>
          <a href="general-carpentry.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="finish-carpentry.php" class="card__title-link">Finish Carpentry</a></h3>
          <p>Crown molding, baseboards, wainscoting, built-ins and custom trim that add detail
            and value with a flawless fit.</p>
          <a href="finish-carpentry.php" class="card__more">Learn more →</a>
        </article>
        <article class="card">
          <h3><a href="home-remodeling.php" class="card__title-link">Home Remodeling</a></h3>
          <p>Kitchens, bathrooms and full-room renovations managed end to end — design help,
            demo, build and finish.</p>
          <a href="home-remodeling.php" class="card__more">Learn more →</a>
        </article>
        <article class="card card--accent">
          <h3>Not sure where to start?</h3>
          <p>Try our instant quote calculator or tell us about your project for a clear,
            written estimate — free.</p>
          <a href="tools.php#calc-section" class="card__link">Get an instant quote →</a>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== ABOUT ===== -->
  <section class="section section--alt" id="about">
    <div class="container about">
      <div class="about__media">
        <img src="assets/projects/custom-trim-wainscoting-carpentry-massachusetts.jpg"
             alt="Detail of custom trim and paneling work by PRC Group — the craftsmanship behind every project"
             loading="lazy" />
        <div class="about__badge">
          <strong>Since <?= BUSINESS_FOUNDED ?></strong>
          <span>Craftsmanship in <?= BUSINESS_AREA ?></span>
        </div>
      </div>
      <div class="about__body">
        <span class="section__eyebrow">About <?= BUSINESS_NAME ?></span>
        <h2>Craftsmanship you can see, service you can trust</h2>
        <p><?= BUSINESS_NAME ?> is a full-service painting, carpentry and remodeling company serving
          homeowners and businesses throughout <?= BUSINESS_AREA ?>. We built our reputation on doing
          the small things right — careful prep, clean job sites, honest communication and
          finishes that last.</p>
        <p>Whether you need a room refreshed, custom trim installed, or a full home remodel,
          you work with one accountable team from estimate to final walkthrough.</p>
        <ul class="checklist">
          <li>Detailed, no-pressure written estimates</li>
          <li>Experienced, in-house painters &amp; carpenters</li>
          <li>Respect for your home and schedule</li>
          <li>Backed by a workmanship warranty</li>
        </ul>
        <a href="booking.php" class="btn btn--primary">Book a Free Consultation</a>
      </div>
    </div>
  </section>

  <!-- ===== PROCESS ===== -->
  <section class="section" id="process">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">How It Works</span>
        <h2>A Simple, Transparent Process</h2>
        <p>No surprises — just a clear path from first call to a finished space you love.</p>
      </div>
      <div class="steps">
        <div class="step"><div class="step__num">1</div><h3>Free Consultation</h3>
          <p>We visit, listen to your goals and assess the space in detail.</p></div>
        <div class="step"><div class="step__num">2</div><h3>Written Estimate</h3>
          <p>You get a clear, itemized quote — scope, materials and timeline.</p></div>
        <div class="step"><div class="step__num">3</div><h3>Skilled Execution</h3>
          <p>Our crew preps, protects and works clean, on schedule.</p></div>
        <div class="step"><div class="step__num">4</div><h3>Final Walkthrough</h3>
          <p>We review every detail together until you're 100% satisfied.</p></div>
      </div>
    </div>
  </section>

  <!-- ===== PROJECTS ===== -->
  <section class="section section--alt" id="projects">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Our Work</span>
        <h2>Recent Projects</h2>
        <p>A look at the kind of transformations we deliver.</p>
      </div>
      <div class="gallery">
        <figure class="gallery__item">
          <img src="assets/projects/interior-painting-repaint-massachusetts.jpg"
               alt="Freshly repainted two-story living room with floor-to-ceiling ocean-view windows — interior painting by PRC Group in Massachusetts"
               width="900" height="1200" loading="lazy" />
          <span>Interior Repaint</span>
        </figure>
        <figure class="gallery__item">
          <img src="assets/projects/kitchen-remodel-cabinets-countertop-massachusetts.jpg"
               alt="Kitchen remodel in progress with new white shaker cabinets, granite countertop and undermount sink — PRC Group, Massachusetts"
               width="1200" height="675" loading="lazy" />
          <span>Kitchen Remodel</span>
        </figure>
        <figure class="gallery__item">
          <img src="assets/projects/exterior-siding-painting-massachusetts.jpg"
               alt="Exterior siding replacement and painting on a brick building in Massachusetts — PRC Group crew working from a boom lift"
               width="1200" height="584" loading="lazy" />
          <span>Exterior &amp; Siding</span>
        </figure>
        <figure class="gallery__item">
          <img src="assets/projects/custom-trim-wainscoting-carpentry-massachusetts.jpg"
               alt="Custom vertical paneling with coat hook rail and crown molding — finish carpentry by PRC Group in Massachusetts"
               width="900" height="1200" loading="lazy" />
          <span>Custom Trim</span>
        </figure>
        <figure class="gallery__item">
          <img src="assets/projects/bathroom-renovation-remodeling-massachusetts.jpg"
               alt="Renovated bathroom with white wainscoting, marble-top vanity and new flooring — remodeling by PRC Group in Massachusetts"
               width="900" height="1200" loading="lazy" />
          <span>Bathroom Renovation</span>
        </figure>
        <figure class="gallery__item">
          <img src="assets/projects/deck-construction-carpentry-massachusetts.jpg"
               alt="New pressure-treated deck framing built by PRC Group carpenters at a Massachusetts home"
               width="675" height="1200" loading="lazy" />
          <span>Deck &amp; Carpentry</span>
        </figure>
      </div>
    </div>
  </section>

  <!-- ===== REVIEWS ===== -->
  <section class="section" id="reviews">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Testimonials</span>
        <h2>What Our Clients Say</h2>
      </div>
      <div class="reviews">
        <blockquote class="review"><div class="review__stars">★★★★★</div>
          <p>"<?= BUSINESS_NAME ?> repainted our whole interior and rebuilt our front porch. Spotless
            work and they finished right on schedule."</p><footer>— Homeowner, Worcester</footer></blockquote>
        <blockquote class="review"><div class="review__stars">★★★★★</div>
          <p>"The finish carpentry and crown molding came out beautiful. True craftsmen who
            care about the details."</p><footer>— Homeowner, Boston</footer></blockquote>
        <blockquote class="review"><div class="review__stars">★★★★★</div>
          <p>"Full kitchen remodel from demo to paint. Clear pricing, clean crew, and the result
            exceeded our expectations."</p><footer>— Homeowner, Springfield</footer></blockquote>
      </div>
      <div class="reviews__cta">
        <p>Worked with us? Your feedback helps neighbors find a contractor they can trust.</p>
        <a href="<?= GOOGLE_REVIEW_URL ?>" class="btn btn--primary" target="_blank" rel="noopener">★ Leave Us a Review on Google</a>
      </div>
    </div>
  </section>

  <!-- ===== CTA BANNER ===== -->
  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Ready to transform your space?</h2>
        <p>Get a free, no-obligation estimate from <?= BUSINESS_NAME ?> today.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">📞 Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

  <!-- ===== CONTACT ===== -->
  <section class="section" id="contact">
    <div class="container contact">
      <div class="contact__info">
        <span class="section__eyebrow">Get In Touch</span>
        <h2>Request Your Free Estimate</h2>
        <p>Tell us about your project and we'll get back to you within one business day.</p>
        <ul class="contact__list">
          <li><span>📞</span> <a href="tel:<?= BUSINESS_PHONE_RAW ?>"><?= BUSINESS_PHONE ?></a></li>
          <li><span>✉️</span> <a href="mailto:<?= BUSINESS_EMAIL ?>"><?= BUSINESS_EMAIL_PUBLIC ?></a></li>
          <li><span>📍</span> <a href="<?= GOOGLE_PROFILE_URL ?>" target="_blank" rel="noopener"><?= BUSINESS_ADDRESS ?></a></li>
          <li><span>🗺️</span> Serving all of <?= BUSINESS_AREA ?></li>
          <li><span>🕐</span> <?= BUSINESS_HOURS ?></li>
        </ul>
      </div>

      <form class="contact__form" id="quoteForm" novalidate>
        <input type="hidden" name="form" value="contact" />
        <p class="hidden-field"><label>Skip: <input name="botcheck" tabindex="-1" autocomplete="off" /></label></p>
        <div class="field">
          <label for="name">Full name</label>
          <input type="text" id="name" name="name" required placeholder="Your name" />
        </div>
        <div class="field-row">
          <div class="field">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" required placeholder="<?= BUSINESS_PHONE ?>" />
          </div>
          <div class="field">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="you@email.com" />
          </div>
        </div>
        <div class="field">
          <label for="address">Project address</label>
          <input type="text" id="address" name="address" placeholder="Street, City — e.g. 12 Main St, Wakefield" autocomplete="street-address" />
        </div>
        <div class="field">
          <label for="service">Service needed</label>
          <select id="service" name="service">
            <option value="">Select a service…</option>
            <option>Interior Painting</option>
            <option>Exterior Painting</option>
            <option>General Carpentry</option>
            <option>Finish Carpentry</option>
            <option>Home Remodeling</option>
            <option>Other / Not sure</option>
          </select>
        </div>
        <div class="field">
          <label for="message">Project details</label>
          <textarea id="message" name="message" rows="4" placeholder="Tell us a bit about your project…"></textarea>
        </div>
        <button type="submit" class="btn btn--primary btn--full">Send Request</button>
        <p class="form-note" id="formNote" hidden></p>
      </form>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
