/* PRC Group — interactive tools (shared nav/year live in site.js) */
(function () {
  "use strict";

  /* =====================================================
     1) QUOTE CALCULATOR
     ===================================================== */
  var SERVICES = {
    interior:  { label: "Interior Painting", unit: "rooms",     base: 450,  min: 1, max: 20, step: 1, suffix: "room(s)" },
    exterior:  { label: "Exterior Painting", unit: "homesize",  base: 0 },
    carpentry: { label: "General Carpentry", unit: "scale",     base: 0 },
    finish:    { label: "Finish Carpentry",  unit: "linft",     base: 14,   min: 10, max: 400, step: 5, suffix: "linear ft" },
    remodel:   { label: "Home Remodeling",   unit: "remodel",   base: 0 }
  };
  var HOMESIZE = { small: { label: "Small (≤1,500 sq ft)", v: 3200 }, medium: { label: "Medium (1,500–2,800)", v: 5800 }, large: { label: "Large (2,800+ sq ft)", v: 9500 } };
  var SCALE    = { small: { label: "Small repair / 1 day", v: 850 }, medium: { label: "Medium project", v: 2800 }, large: { label: "Large / multi-day", v: 6500 } };
  var REMODEL  = { bathroom: { label: "Bathroom", v: 9000 }, kitchen: { label: "Kitchen", v: 19000 }, room: { label: "Other room", v: 12000 } };
  var FINISH   = { standard: { label: "Standard", m: 1.0 }, premium: { label: "Premium", m: 1.27 }, luxury: { label: "Luxury", m: 1.6 } };

  var calc = document.getElementById("calc");
  if (calc) {
    var state = { service: null, qty: 3, sizeKey: null, finish: "standard", contact: {} };
    var step = 0;
    var steps = calc.querySelectorAll(".calc__step");
    var bars = calc.querySelectorAll(".calc__bar div");
    var backBtn = calc.querySelector("#calcBack");
    var nextBtn = calc.querySelector("#calcNext");

    // Steps where the user picks a box (service, size options, finish) advance
    // on click — no Continue button needed there.
    function isBoxStep() {
      if (step === 0 || step === 2) return true;
      if (step === 1) { var s = SERVICES[state.service]; return s && !(s.unit === "rooms" || s.unit === "linft"); }
      return false;
    }
    function goNext() { if (canAdvance()) { step++; show(); } }

    function show() {
      steps.forEach(function (s, i) { s.classList.toggle("active", i === step); });
      bars.forEach(function (b, i) {
        b.classList.toggle("active", i === step);
        b.classList.toggle("done", i < step);
      });
      var boxStep = isBoxStep();
      backBtn.classList.toggle("is-hidden", step === 0);
      nextBtn.classList.toggle("is-hidden", boxStep);
      var navEl = calc.querySelector(".calc__nav");
      if (navEl) navEl.style.display = (boxStep && step === 0) ? "none" : "flex";
      nextBtn.textContent = step === steps.length - 2 ? "See my estimate" : (step === steps.length - 1 ? "Send request" : "Continue");
      if (step === steps.length - 1) buildResult();
    }

    /* Step 1 — service selection */
    calc.querySelectorAll("[data-service]").forEach(function (el) {
      el.addEventListener("click", function () {
        calc.querySelectorAll("[data-service]").forEach(function (o) { o.classList.remove("sel"); });
        el.classList.add("sel");
        state.service = el.getAttribute("data-service");
        renderDetail();
        setTimeout(goNext, 140);
      });
    });

    /* Step 2 — dynamic detail */
    var detail = calc.querySelector("#calcDetail");
    function renderDetail() {
      var s = SERVICES[state.service];
      var html = "";
      if (s.unit === "rooms" || s.unit === "linft") {
        state.qty = s.unit === "rooms" ? 3 : 40;
        html =
          '<label>How many ' + s.suffix + '?</label>' +
          '<div class="stepper">' +
          '<button type="button" data-step="-1">−</button>' +
          '<input id="qty" type="number" value="' + state.qty + '" min="' + s.min + '" max="' + s.max + '" step="' + s.step + '">' +
          '<button type="button" data-step="1">+</button></div>';
      } else {
        var map = s.unit === "homesize" ? HOMESIZE : s.unit === "scale" ? SCALE : REMODEL;
        state.sizeKey = null;
        html = '<div class="opt-grid">';
        Object.keys(map).forEach(function (k) {
          html += '<div class="opt" data-size="' + k + '">' + map[k].label + '</div>';
        });
        html += '</div>';
      }
      detail.innerHTML = html;

      detail.querySelectorAll("[data-step]").forEach(function (b) {
        b.addEventListener("click", function () {
          var inp = detail.querySelector("#qty");
          var d = parseInt(b.getAttribute("data-step"), 10) * s.step;
          var nv = Math.min(s.max, Math.max(s.min, (parseInt(inp.value, 10) || s.min) + d));
          inp.value = nv; state.qty = nv;
        });
      });
      var qtyInput = detail.querySelector("#qty");
      if (qtyInput) qtyInput.addEventListener("input", function () { state.qty = parseInt(qtyInput.value, 10) || s.min; });

      detail.querySelectorAll("[data-size]").forEach(function (el) {
        el.addEventListener("click", function () {
          detail.querySelectorAll("[data-size]").forEach(function (o) { o.classList.remove("sel"); });
          el.classList.add("sel");
          state.sizeKey = el.getAttribute("data-size");
          setTimeout(goNext, 140);
        });
      });
    }

    /* Step 3 — finish level */
    calc.querySelectorAll("[data-finish]").forEach(function (el) {
      el.addEventListener("click", function () {
        calc.querySelectorAll("[data-finish]").forEach(function (o) { o.classList.remove("sel"); });
        el.classList.add("sel");
        state.finish = el.getAttribute("data-finish");
        setTimeout(goNext, 140);
      });
    });

    function estimate() {
      var s = SERVICES[state.service];
      var base = 0;
      if (s.unit === "rooms") base = state.qty * s.base;
      else if (s.unit === "linft") base = state.qty * s.base + 200;
      else if (s.unit === "homesize") base = (HOMESIZE[state.sizeKey] || {}).v || 0;
      else if (s.unit === "scale") base = (SCALE[state.sizeKey] || {}).v || 0;
      else if (s.unit === "remodel") base = (REMODEL[state.sizeKey] || {}).v || 0;
      var total = base * FINISH[state.finish].m;
      return { low: Math.round(total * 0.85 / 50) * 50, high: Math.round(total * 1.2 / 50) * 50 };
    }

    function money(n) { return "$" + n.toLocaleString("en-US"); }

    function buildResult() {
      var s = SERVICES[state.service];
      var est = estimate();
      var sizeLabel = s.unit === "rooms" ? state.qty + " " + s.suffix
        : s.unit === "linft" ? state.qty + " " + s.suffix
        : ((s.unit === "homesize" ? HOMESIZE : s.unit === "scale" ? SCALE : REMODEL)[state.sizeKey] || {}).label || "—";

      calc.querySelector("#resRange").innerHTML = money(est.low) + " <span>–</span> " + money(est.high);
      calc.querySelector("#resSum").innerHTML =
        row("Service", s.label) + row("Project", sizeLabel) + row("Finish level", FINISH[state.finish].label);

      // feed hidden form fields so the lead carries the estimate
      setHidden("f_service", s.label);
      setHidden("f_project", sizeLabel);
      setHidden("f_finish", FINISH[state.finish].label);
      setHidden("f_estimate", money(est.low) + " – " + money(est.high));
    }
    function row(a, b) { return '<div><span>' + a + '</span><span>' + b + '</span></div>'; }
    function setHidden(id, v) { var el = document.getElementById(id); if (el) el.value = v; }

    /* Validation per step */
    function canAdvance() {
      if (step === 0) return !!state.service;
      if (step === 1) {
        var s = SERVICES[state.service];
        return (s.unit === "rooms" || s.unit === "linft") ? state.qty > 0 : !!state.sizeKey;
      }
      if (step === 3) {
        var nm = document.getElementById("cname"), ph = document.getElementById("cphone");
        var ok = nm.value.trim() !== "" && ph.value.trim() !== "";
        if (!ok) (nm.value.trim() === "" ? nm : ph).focus();
        return ok;
      }
      return true;
    }

    function submitQuote() {
      var form = calc.querySelector("#quoteForm");
      var noteEl = calc.querySelector("#quoteNote");
      nextBtn.disabled = true; nextBtn.textContent = "Sending…";
      if (noteEl) { noteEl.hidden = false; noteEl.className = "form-note"; noteEl.textContent = "Sending…"; }

      fetch("api/send.php", { method: "POST", body: new FormData(form) })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data && data.success) {
            if (window.prcTrack) window.prcTrack("generate_lead", { form_type: "quote_calculator" });
            if (noteEl) { noteEl.className = "form-note ok"; noteEl.textContent = "Sent! We'll be in touch shortly with your detailed quote."; }
            backBtn.classList.add("is-hidden");
            nextBtn.classList.add("is-hidden");
          } else {
            nextBtn.disabled = false; nextBtn.textContent = "Send request";
            if (noteEl) { noteEl.className = "form-note err"; noteEl.textContent = (data && data.message) || "Something went wrong. Please call us."; }
          }
        })
        .catch(function () {
          nextBtn.disabled = false; nextBtn.textContent = "Send request";
          if (noteEl) { noteEl.className = "form-note err"; noteEl.textContent = "Network error. Please call us or try again."; }
        });
    }

    nextBtn.addEventListener("click", function () {
      if (step === steps.length - 1) { submitQuote(); return; }
      if (!canAdvance()) { nextBtn.classList.add("shake"); setTimeout(function(){ nextBtn.classList.remove("shake"); }, 400); return; }
      step++; show();
    });
    backBtn.addEventListener("click", function () { if (step > 0) { step--; show(); } });

    show();
  }

  /* =====================================================
     2) COLOR VISUALIZER
     ===================================================== */
  // Real Benjamin Moore colors (name, code, approximate hex, family).
  // Swatches are rendered from the hex; the code deep-links to benjaminmoore.com.
  var COLORS = [
    { name: "White Dove",       code: "OC-17",   hex: "#f0efe4", fam: "Soft white" },
    { name: "Chantilly Lace",   code: "OC-65",   hex: "#f7f8f2", fam: "Crisp white" },
    { name: "Simply White",     code: "OC-117",  hex: "#f4f0e1", fam: "Warm white" },
    { name: "Swiss Coffee",     code: "OC-45",   hex: "#eae4d6", fam: "Creamy white" },
    { name: "Cloud White",      code: "OC-130",  hex: "#f1ecdf", fam: "Soft white" },
    { name: "Revere Pewter",    code: "HC-172",  hex: "#cbc3b3", fam: "Warm greige" },
    { name: "Edgecomb Gray",    code: "HC-173",  hex: "#d5cdbd", fam: "Light greige" },
    { name: "Balboa Mist",      code: "OC-27",   hex: "#d6d0c5", fam: "Soft greige" },
    { name: "Classic Gray",     code: "OC-23",   hex: "#dcd8cd", fam: "Warm gray" },
    { name: "Manchester Tan",   code: "HC-81",   hex: "#d7c8ab", fam: "Warm tan" },
    { name: "Stonington Gray",  code: "HC-170",  hex: "#c0c4c1", fam: "Cool gray" },
    { name: "Gray Owl",         code: "OC-52",   hex: "#cdcec4", fam: "Light gray" },
    { name: "Coventry Gray",    code: "HC-169",  hex: "#a8a89d", fam: "Mid gray" },
    { name: "Chelsea Gray",     code: "HC-168",  hex: "#787169", fam: "Deep gray" },
    { name: "October Mist",     code: "1495",    hex: "#a3a891", fam: "Sage green" },
    { name: "Guilford Green",   code: "HC-116",  hex: "#a7ab8d", fam: "Soft green" },
    { name: "Saybrook Sage",    code: "HC-114",  hex: "#93a084", fam: "Muted green" },
    { name: "Hunter Green",     code: "2041-10", hex: "#38473c", fam: "Deep green" },
    { name: "Palladian Blue",   code: "HC-144",  hex: "#b7cdc4", fam: "Soft blue-green" },
    { name: "Wythe Blue",       code: "HC-143",  hex: "#a7bdb0", fam: "Vintage blue" },
    { name: "Aegean Teal",      code: "2136-40", hex: "#6d7f76", fam: "Teal" },
    { name: "Hale Navy",        code: "HC-154",  hex: "#434b52", fam: "Navy" },
    { name: "Newburyport Blue", code: "HC-155",  hex: "#33414e", fam: "Deep blue" },
    { name: "First Light",      code: "2102-70", hex: "#f0ddd7", fam: "Soft pink" },
    { name: "Caliente",         code: "AF-290",  hex: "#a3352f", fam: "Bold red" },
    { name: "Gentleman's Gray", code: "2062-20", hex: "#2d3b42", fam: "Blue-black" }
  ];

  function bmUrl(c) {
    var codeSlug = c.code.toLowerCase().replace(/\s+/g, "-");
    var nameSlug = c.name.toLowerCase().replace(/[^a-z0-9]+/g, "-").replace(/^-|-$/g, "");
    return "https://www.benjaminmoore.com/en-us/paint-colors/color/" + codeSlug + "/" + nameSlug;
  }

  var wall = document.getElementById("vizWall");
  var swatches = document.getElementById("vizSwatches");
  var current = document.getElementById("vizCurrent");
  var search = document.getElementById("vizSearch");
  var bmLink = document.getElementById("vizBmLink");
  var photo = document.getElementById("vizPhoto");
  var tint = document.getElementById("vizTint");
  var fileInput = document.getElementById("vizFile");
  var opacity = document.getElementById("vizOpacity");
  var removeBtn = document.getElementById("vizRemove");
  var intensity = document.getElementById("vizIntensity");
  var room = document.getElementById("vizRoom");
  var uploadLabel = document.getElementById("vizUploadLabel");

  if (wall && swatches) {
    var selected = COLORS[0];

    function applyColor(c) {
      selected = c;
      wall.style.background = c.hex;
      if (tint) tint.style.background = c.hex;
      if (current) current.innerHTML = c.name + " <em>" + c.code + "</em><small>" +
        c.fam + " · " + c.hex.toUpperCase() + "</small>";
      if (bmLink) bmLink.href = bmUrl(c);
    }

    function renderSwatches(filter) {
      swatches.innerHTML = "";
      var q = (filter || "").trim().toLowerCase();
      var list = COLORS.filter(function (c) {
        return !q || (c.name + " " + c.code + " " + c.fam).toLowerCase().indexOf(q) > -1;
      });
      if (!list.length) {
        swatches.innerHTML = '<p class="viz__empty">No colors match. Try another name or code.</p>';
        return;
      }
      list.forEach(function (c) {
        var sw = document.createElement("button");
        sw.type = "button";
        sw.className = "swatch" + (c === selected ? " sel" : "");
        sw.style.background = c.hex;
        sw.title = c.name + " " + c.code;
        sw.setAttribute("aria-label", c.name + " " + c.code);
        sw.addEventListener("click", function () {
          swatches.querySelectorAll(".swatch").forEach(function (s) { s.classList.remove("sel"); });
          sw.classList.add("sel");
          applyColor(c);
        });
        swatches.appendChild(sw);
      });
    }

    renderSwatches("");
    applyColor(COLORS[0]);
    if (search) search.addEventListener("input", function () { renderSwatches(search.value); });

    /* Upload a room photo and apply the selected color over it */
    if (fileInput) {
      fileInput.addEventListener("change", function () {
        var f = fileInput.files && fileInput.files[0];
        if (!f) return;
        photo.src = URL.createObjectURL(f);
        photo.hidden = false;
        if (tint) { tint.hidden = false; tint.style.opacity = (opacity ? opacity.value / 100 : 0.55); }
        if (room) room.hidden = true;
        if (intensity) intensity.hidden = false;
        if (uploadLabel) uploadLabel.textContent = "Choose a different photo";
      });
    }
    if (opacity) opacity.addEventListener("input", function () {
      if (tint) tint.style.opacity = opacity.value / 100;
    });
    if (removeBtn) removeBtn.addEventListener("click", function () {
      photo.hidden = true;
      if (tint) tint.hidden = true;
      if (room) room.hidden = false;
      if (intensity) intensity.hidden = true;
      if (fileInput) fileInput.value = "";
      if (uploadLabel) uploadLabel.textContent = "Upload a photo of your room";
    });
  }

  /* =====================================================
     3) BEFORE / AFTER SLIDER
     ===================================================== */
  var range = document.getElementById("baRange");
  var before = document.getElementById("baBefore");
  var handle = document.getElementById("baHandle");
  function setBA(p) {
    if (before) before.style.clipPath = "inset(0 " + (100 - p) + "% 0 0)";
    if (handle) handle.style.left = p + "%";
  }
  if (range) {
    range.addEventListener("input", function () { setBA(range.value); });
    setBA(range.value);
  }
})();
