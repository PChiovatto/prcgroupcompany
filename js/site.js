/* PRC Group — shared site behavior (loaded on every page) */
(function () {
  "use strict";

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

  var header = document.getElementById("header");
  if (header) {
    var onScroll = function () { header.classList.toggle("scrolled", window.scrollY > 10); };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  var yearEl = document.getElementById("year");
  if (yearEl) yearEl.textContent = new Date().getFullYear();
})();
