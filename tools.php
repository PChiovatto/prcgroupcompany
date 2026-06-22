<?php
require_once __DIR__ . '/includes/config.php';
$pageTitle = 'Instant Quote & Project Tools | ' . BUSINESS_NAME;
$pageDesc  = 'Get an instant painting, carpentry or remodeling estimate, preview paint colors and compare before/after results — ' . BUSINESS_NAME . ' interactive project tools.';
$canonical = SITE_URL . '/tools.php';
$active    = 'tools';
$extraCSS  = ['css/tools.css'];
$extraJS   = ['js/tools.js'];
include __DIR__ . '/includes/header.php';
?>

  <section class="tools-hero">
    <div class="container">
      <h1>Project Tools</h1>
      <p>Get an instant ballpark estimate, preview wall colors and see the kind of transformation
        we deliver — all in a few clicks.</p>
    </div>
  </section>

  <!-- ===== QUOTE CALCULATOR ===== -->
  <section class="section" id="calc-section">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Instant Estimate</span>
        <h2>Quote Calculator</h2>
        <p>Answer a few quick questions for an instant price range. No obligation.</p>
      </div>

      <div class="calc" id="calc">
        <div class="calc__bar">
          <div class="active">Service</div><div>Details</div><div>Finish</div><div>Contact</div><div>Estimate</div>
        </div>

        <form id="quoteForm" class="calc__body" novalidate>
          <input type="hidden" name="form" value="quote" />
          <p class="hidden-field"><label>Skip: <input name="botcheck" tabindex="-1" autocomplete="off" /></label></p>
          <input type="hidden" id="f_service" name="service" />
          <input type="hidden" id="f_project" name="project" />
          <input type="hidden" id="f_finish" name="finish" />
          <input type="hidden" id="f_estimate" name="estimate" />

          <div class="calc__step active">
            <h3>What do you need done?</h3>
            <p class="hint">Pick the service that best fits your project.</p>
            <div class="opt-grid">
              <div class="opt" data-service="interior"><span class="ico">🎨</span>Interior Painting</div>
              <div class="opt" data-service="exterior"><span class="ico">🏠</span>Exterior Painting</div>
              <div class="opt" data-service="carpentry"><span class="ico">🔨</span>General Carpentry</div>
              <div class="opt" data-service="finish"><span class="ico">📐</span>Finish Carpentry</div>
              <div class="opt" data-service="remodel"><span class="ico">🛠️</span>Home Remodeling</div>
            </div>
          </div>

          <div class="calc__step">
            <h3>Tell us the size</h3>
            <p class="hint">This helps us ballpark the scope.</p>
            <div id="calcDetail"></div>
          </div>

          <div class="calc__step">
            <h3>Choose a finish level</h3>
            <p class="hint">Higher levels mean more prep and premium materials.</p>
            <div class="opt-grid">
              <div class="opt sel" data-finish="standard"><span class="ico">●</span>Standard
                <small>Quality materials, clean finish</small></div>
              <div class="opt" data-finish="premium"><span class="ico">●●</span>Premium
                <small>Premium paints, extra prep</small></div>
              <div class="opt" data-finish="luxury"><span class="ico">●●●</span>Luxury
                <small>Top-tier finishes, custom detail</small></div>
            </div>
          </div>

          <div class="calc__step">
            <h3>Where should we send it?</h3>
            <p class="hint">We'll email your estimate and follow up within one business day.</p>
            <div class="field">
              <label for="cname">Full name</label>
              <input type="text" id="cname" name="name" required placeholder="Your name" />
            </div>
            <div class="field-row">
              <div class="field">
                <label for="cphone">Phone</label>
                <input type="tel" id="cphone" name="phone" required placeholder="<?= BUSINESS_PHONE ?>" />
              </div>
              <div class="field">
                <label for="cemail">Email</label>
                <input type="email" id="cemail" name="email" placeholder="you@email.com" />
              </div>
            </div>
            <div class="field">
              <label for="cmsg">Anything else? (optional)</label>
              <textarea id="cmsg" name="message" rows="3" placeholder="Timeline, address, details…"></textarea>
            </div>
          </div>

          <div class="calc__step">
            <div class="result">
              <span class="section__eyebrow">Your estimated range</span>
              <div class="result__range" id="resRange">—</div>
              <div class="result__sum" id="resSum"></div>
              <p class="disclaimer">This is a rough, automated estimate based on typical <?= BUSINESS_AREA ?>
                pricing — not a final quote. We'll confirm with a free on-site assessment. Press
                <strong>Send request</strong> and we'll be in touch.</p>
              <p class="form-note" id="quoteNote" hidden></p>
            </div>
          </div>

          <div class="calc__nav">
            <button type="button" id="calcBack" class="btn btn--back is-hidden">Back</button>
            <button type="button" id="calcNext" class="btn btn--primary">Continue</button>
          </div>
        </form>
      </div>
    </div>
  </section>

  <!-- ===== COLOR VISUALIZER ===== -->
  <section class="section section--alt" id="visualizer">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">Color Visualizer</span>
        <h2>Preview your wall color</h2>
        <p>Tap a color to see it on a sample room. Great for narrowing down before we paint.</p>
      </div>
      <div class="viz">
        <div class="viz__room">
          <div class="viz__wall" id="vizWall">
            <div class="viz__frame"></div>
            <div class="viz__sofa"></div>
          </div>
          <div class="viz__floor"></div>
        </div>
        <div class="viz__panel">
          <h3>Choose a shade</h3>
          <div class="viz__current" id="vizCurrent">Cloud White<small>#EEF0EF</small></div>
          <div class="swatches" id="vizSwatches"></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== BEFORE / AFTER ===== -->
  <section class="section" id="beforeafter">
    <div class="container">
      <div class="section__head">
        <span class="section__eyebrow">See the difference</span>
        <h2>Before &amp; After</h2>
        <p>Drag the slider to reveal the transformation. (Placeholder — swap for real project photos.)</p>
      </div>
      <div class="ba">
        <div class="ba__stage" id="baStage">
          <div class="ba__img ba__after">AFTER</div>
          <div class="ba__img ba__before" id="baBefore">BEFORE</div>
          <span class="ba__tag ba__tag--b">Before</span>
          <span class="ba__tag ba__tag--a">After</span>
          <div class="ba__handle" id="baHandle"><div class="ba__grip">⇆</div></div>
        </div>
        <input type="range" id="baRange" min="0" max="100" value="50" aria-label="Before and after slider" />
      </div>
    </div>
  </section>

  <section class="cta-banner">
    <div class="container cta-banner__inner">
      <div>
        <h2>Prefer to talk it through?</h2>
        <p>Call us for a free, no-obligation on-site estimate.</p>
      </div>
      <a href="tel:<?= BUSINESS_PHONE_RAW ?>" class="btn btn--light">📞 Call <?= BUSINESS_PHONE ?></a>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
