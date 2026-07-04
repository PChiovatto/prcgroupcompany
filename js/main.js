/* PRC Group — home page: contact form via api/send.php */
(function () {
  "use strict";

  var form = document.getElementById("quoteForm");
  var note = document.getElementById("formNote");
  if (!form || !note) return;

  form.addEventListener("submit", function (e) {
    e.preventDefault();
    note.hidden = false;

    var name = form.querySelector("#name").value.trim();
    var phone = form.querySelector("#phone").value.trim();
    if (!name || !phone) {
      note.className = "form-note err";
      note.textContent = "Please enter at least your name and phone number.";
      return;
    }

    var btn = form.querySelector("button[type=submit]");
    btn.disabled = true; btn.textContent = "Sending…";
    note.className = "form-note";
    note.textContent = "Sending…";

    fetch("api/send.php", { method: "POST", body: new FormData(form) })
      .then(function (r) { return r.json(); })
      .then(function (data) {
        if (data && data.success) {
          note.className = "form-note ok";
          note.textContent = "Thanks! Your request has been sent — we'll be in touch shortly.";
          if (window.prcTrack) window.prcTrack("generate_lead", { form_type: "contact" });
          form.reset();
        } else {
          note.className = "form-note err";
          note.textContent = (data && data.message) || "Something went wrong. Please call us.";
        }
      })
      .catch(function () {
        note.className = "form-note err";
        note.textContent = "Network error. Please call us or try again.";
      })
      .finally(function () { btn.disabled = false; btn.textContent = "Send Request"; });
  });
})();
