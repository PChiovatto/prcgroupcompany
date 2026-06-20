/* PRC Group — interactive tools */
(function () {
  "use strict";

  /* ---------- Shared: mobile nav + year (mirrors main.js) ---------- */
  var toggle = document.getElementById("navToggle");
  var nav = document.getElementById("nav");
  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("open");
      toggle.classList.toggle("open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
  }
  var header = document.getElementById("header");
  if (header) {
    window.addEventListener("scroll", function () {
      header.classList.toggle("scrolled", window.scrollY > 10);
    }, { passive: true });
  }
  var y = document.getElementById("year");
  if (y) y.textContent = new Date().getFullYear();

  /* =====================================================
     1) QUOTE CALCULATOR
     ===================================================== */
  var SERVICES = {
    interior:  { label: "Interior Painting", icon: "🎨", unit: "rooms",     base: 450,  min: 1, max: 20, step: 1, suffix: "room(s)" },
    exterior:  { label: "Exterior Painting", icon: "🏠", unit: "homesize",  base: 0 },
    carpentry: { label: "General Carpentry", icon: "🔨", unit: "scale",     base: 0 },
    finish:    { label: "Finish Carpentry",  icon: "📐", unit: "linft",     base: 14,   min: 10, max: 400, step: 5, suffix: "linear ft" },
    remodel:   { label: "Home Remodeling",   icon: "🛠️", unit: "remodel",   base: 0 }
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

    function show() {
      steps.forEach(function (s, i) { s.classList.toggle("active", i === step); });
      bars.forEach(function (b, i) {
        b.classList.toggle("active", i === step);
        b.classList.toggle("done", i < step);
      });
      backBtn.classList.toggle("is-hidden", step === 0);
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
        });
      });
    }

    /* Step 3 — finish level */
    calc.querySelectorAll("[data-finish]").forEach(function (el) {
      el.addEventListener("click", function () {
        calc.querySelectorAll("[data-finish]").forEach(function (o) { o.classList.remove("sel"); });
        el.classList.add("sel");
        state.finish = el.getAttribute("data-finish");
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

    nextBtn.addEventListener("click", function () {
      if (step === steps.length - 1) { calc.querySelector("#quoteForm").requestSubmit(); return; }
      if (!canAdvance()) { nextBtn.classList.add("shake"); setTimeout(function(){ nextBtn.classList.remove("shake"); }, 400); return; }
      step++; show();
    });
    backBtn.addEventListener("click", function () { if (step > 0) { step--; show(); } });

    show();
  }

  /* =====================================================
     2) COLOR VISUALIZER
     ===================================================== */
  var COLORS = [
    ["Cloud White", "#eef0ef"], ["Warm Linen", "#e7ddc9"], ["Soft Sand", "#d8c4a3"],
    ["Sage", "#9fae93"], ["Eucalyptus", "#7c9a8e"], ["Ocean Teal", "#3f7d83"],
    ["Slate Blue", "#5b7390"], ["Navy", "#26405c"], ["Amber", "#d9912f"],
    ["Terracotta", "#b5654a"], ["Charcoal", "#3a3d40"], ["Greige", "#c7bfb2"]
  ];
  var wall = document.getElementById("vizWall");
  var swatches = document.getElementById("vizSwatches");
  var current = document.getElementById("vizCurrent");
  if (wall && swatches) {
    COLORS.forEach(function (c, i) {
      var sw = document.createElement("div");
      sw.className = "swatch" + (i === 0 ? " sel" : "");
      sw.style.background = c[1];
      sw.title = c[0];
      sw.setAttribute("role", "button");
      sw.setAttribute("aria-label", c[0]);
      sw.addEventListener("click", function () {
        swatches.querySelectorAll(".swatch").forEach(function (s) { s.classList.remove("sel"); });
        sw.classList.add("sel");
        wall.style.background = c[1];
        if (current) current.innerHTML = c[0] + "<small>" + c[1].toUpperCase() + "</small>";
      });
      swatches.appendChild(sw);
    });
    wall.style.background = COLORS[0][1];
    if (current) current.innerHTML = COLORS[0][0] + "<small>" + COLORS[0][1].toUpperCase() + "</small>";
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
