/* PRC Group — site interactions */
(function () {
  "use strict";

  // Mobile nav toggle
  var toggle = document.getElementById("navToggle");
  var nav = document.getElementById("nav");
  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("open");
      toggle.classList.toggle("open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        nav.classList.remove("open");
        toggle.classList.remove("open");
        toggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  // Header shadow on scroll
  var header = document.getElementById("header");
  if (header) {
    var onScroll = function () {
      header.classList.toggle("scrolled", window.scrollY > 10);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  // Current year in footer
  var yearEl = document.getElementById("year");
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // Contact form: basic validation + graceful note.
  // On Netlify the POST is handled automatically; elsewhere we just confirm.
  var form = document.getElementById("quoteForm");
  var note = document.getElementById("formNote");
  if (form && note) {
    form.addEventListener("submit", function (e) {
      var name = form.querySelector("#name");
      var phone = form.querySelector("#phone");
      var valid = name.value.trim() !== "" && phone.value.trim() !== "";

      if (!valid) {
        e.preventDefault();
        note.hidden = false;
        note.className = "form-note err";
        note.textContent = "Please enter at least your name and phone number.";
        return;
      }

      // If running locally / not on Netlify, prevent navigation and show confirmation.
      var isNetlify = /netlify|prcgroupcompany\.com/i.test(location.host);
      if (!isNetlify) {
        e.preventDefault();
        note.hidden = false;
        note.className = "form-note ok";
        note.textContent = "Thanks! Your request looks good. (Live form delivery activates once the site is hosted.)";
        form.reset();
      }
    });
  }
})();
