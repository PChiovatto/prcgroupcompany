/* PRC Group — booking / scheduling system
   ----------------------------------------------------------
   EMAIL SETUP (free, no backend) via Web3Forms:
   1) Go to https://web3forms.com → enter your email → get an Access Key.
   2) Paste it below as WEB3FORMS_ACCESS_KEY.
   3) (Optional) In the Web3Forms dashboard enable the Autoresponder so the
      customer also receives a confirmation email.
   Until a real key is set, the page runs in DEMO mode (no email sent).
   ---------------------------------------------------------- */
(function () {
  "use strict";

  var WEB3FORMS_ACCESS_KEY = "YOUR-ACCESS-KEY-HERE";
  var BUSINESS_NAME = "PRC Group";

  /* ---------- shared nav/year ---------- */
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
  if (header) window.addEventListener("scroll", function () {
    header.classList.toggle("scrolled", window.scrollY > 10);
  }, { passive: true });
  var yr = document.getElementById("year");
  if (yr) yr.textContent = new Date().getFullYear();

  /* ---------- calendar ---------- */
  var MONTHS = ["January","February","March","April","May","June","July","August","September","October","November","December"];
  var DOW = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
  var SLOTS = ["08:00","09:00","10:00","11:00","13:00","14:00","15:00","16:00","17:00"];
  var CLOSED_DOW = [0]; // Sunday closed

  var today = new Date(); today.setHours(0, 0, 0, 0);
  var maxDate = new Date(today); maxDate.setDate(maxDate.getDate() + 90); // 3 months ahead
  var view = new Date(today.getFullYear(), today.getMonth(), 1);

  var state = { date: null, time: null };

  var elGrid = document.getElementById("calGrid");
  var elTitle = document.getElementById("calTitle");
  var elPrev = document.getElementById("calPrev");
  var elNext = document.getElementById("calNext");
  var elSel = document.getElementById("bSel");
  var elSlots = document.getElementById("slots");
  var elSlotsWrap = document.getElementById("slotsWrap");
  if (!elGrid) return;

  function sameDay(a, b) { return a.getFullYear() === b.getFullYear() && a.getMonth() === b.getMonth() && a.getDate() === b.getDate(); }
  function fmtDate(d) { return DOW[d.getDay()] + ", " + MONTHS[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear(); }

  function renderCal() {
    elTitle.textContent = MONTHS[view.getMonth()] + " " + view.getFullYear();
    elPrev.disabled = (view.getFullYear() === today.getFullYear() && view.getMonth() === today.getMonth());
    var lastAllowed = new Date(maxDate.getFullYear(), maxDate.getMonth(), 1);
    elNext.disabled = (view.getFullYear() === lastAllowed.getFullYear() && view.getMonth() === lastAllowed.getMonth());

    elGrid.innerHTML = "";
    DOW.forEach(function (d) {
      var h = document.createElement("div"); h.className = "cal__dow"; h.textContent = d; elGrid.appendChild(h);
    });

    var first = new Date(view.getFullYear(), view.getMonth(), 1);
    var startPad = first.getDay();
    var daysIn = new Date(view.getFullYear(), view.getMonth() + 1, 0).getDate();

    for (var p = 0; p < startPad; p++) {
      var e = document.createElement("div"); e.className = "cal__day is-empty"; elGrid.appendChild(e);
    }
    for (var n = 1; n <= daysIn; n++) {
      var d = new Date(view.getFullYear(), view.getMonth(), n);
      var cell = document.createElement("div");
      cell.className = "cal__day";
      cell.textContent = n;
      var off = d < today || d > maxDate || CLOSED_DOW.indexOf(d.getDay()) !== -1;
      if (off) cell.classList.add("is-off");
      if (sameDay(d, today)) cell.classList.add("is-today");
      if (state.date && sameDay(d, state.date)) cell.classList.add("sel");
      if (!off) cell.addEventListener("click", (function (dd) {
        return function () { selectDate(dd); };
      })(d));
      elGrid.appendChild(cell);
    }
  }

  function selectDate(d) {
    state.date = d; state.time = null;
    renderCal();
    elSlotsWrap.classList.remove("is-hidden");
    renderSlots();
    updateSel();
    elSlotsWrap.scrollIntoView({ behavior: "smooth", block: "nearest" });
  }

  function renderSlots() {
    elSlots.innerHTML = "";
    SLOTS.forEach(function (t) {
      var b = document.createElement("div");
      b.className = "slot" + (state.time === t ? " sel" : "");
      b.textContent = t;
      b.addEventListener("click", function () {
        state.time = t;
        renderSlots();
        updateSel();
      });
      elSlots.appendChild(b);
    });
  }

  function updateSel() {
    if (state.date && state.time) {
      elSel.className = "bsel";
      elSel.innerHTML = "📅 <span><strong>" + fmtDate(state.date) + "</strong> at <strong>" + state.time + "</strong></span>";
    } else if (state.date) {
      elSel.className = "bsel";
      elSel.innerHTML = "📅 <span><strong>" + fmtDate(state.date) + "</strong> — pick a time below</span>";
    } else {
      elSel.className = "bsel empty";
      elSel.textContent = "Select a date to see available times.";
    }
  }

  elPrev.addEventListener("click", function () { view.setMonth(view.getMonth() - 1); renderCal(); });
  elNext.addEventListener("click", function () { view.setMonth(view.getMonth() + 1); renderCal(); });

  /* ---------- submit + email ---------- */
  var form = document.getElementById("bookForm");
  var note = document.getElementById("bookNote");
  var bookingView = document.getElementById("bookingView");
  var successView = document.getElementById("successView");

  function showError(msg) { note.className = "bnote bnote--err"; note.textContent = msg; }

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    note.className = "bnote"; note.textContent = "";

    if (!state.date) { showError("Please choose a date on the calendar."); return; }
    if (!state.time) { showError("Please choose a time slot."); return; }
    var name = document.getElementById("bname").value.trim();
    var phone = document.getElementById("bphone").value.trim();
    var email = document.getElementById("bemail").value.trim();
    if (!name || !phone || !email) { showError("Please fill in your name, phone and email."); return; }

    var submitBtn = form.querySelector("button[type=submit]");
    submitBtn.disabled = true; submitBtn.textContent = "Sending…";

    var details = {
      date: fmtDate(state.date),
      time: state.time,
      service: document.getElementById("bservice").value,
      name: name, phone: phone, email: email,
      notes: document.getElementById("bnotes").value.trim()
    };

    var done = function () { renderSuccess(details); };
    var fail = function () {
      submitBtn.disabled = false; submitBtn.textContent = "Confirm booking";
      showError("Sorry, something went wrong sending your request. Please call us at (000) 000-0000.");
    };

    if (!WEB3FORMS_ACCESS_KEY || WEB3FORMS_ACCESS_KEY === "YOUR-ACCESS-KEY-HERE") {
      // DEMO mode — no key configured yet
      setTimeout(done, 600);
      return;
    }

    var payload = {
      access_key: WEB3FORMS_ACCESS_KEY,
      subject: "New booking — " + details.date + " at " + details.time,
      from_name: BUSINESS_NAME + " Website",
      replyto: email,
      "Appointment date": details.date,
      "Appointment time": details.time,
      "Service": details.service,
      "Name": name, "Phone": phone, "Email": email,
      "Notes": details.notes || "—"
    };

    fetch("https://api.web3forms.com/submit", {
      method: "POST",
      headers: { "Content-Type": "application/json", "Accept": "application/json" },
      body: JSON.stringify(payload)
    }).then(function (r) { return r.json(); })
      .then(function (data) { if (data && data.success) done(); else fail(); })
      .catch(fail);
  });

  function renderSuccess(d) {
    document.getElementById("sumDate").textContent = d.date;
    document.getElementById("sumTime").textContent = d.time;
    document.getElementById("sumService").textContent = d.service;
    document.getElementById("sumName").textContent = d.name;
    bookingView.classList.add("is-hidden");
    successView.classList.remove("is-hidden");
    successView.scrollIntoView({ behavior: "smooth", block: "start" });
  }

  renderCal();
  updateSel();
})();
