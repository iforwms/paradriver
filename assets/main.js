(function () {
  var btn = document.getElementById("toggle_menu");
  btn.addEventListener("click", function () {
    document.body.classList.toggle("show_menu");
  });

  var popup = document.getElementById("popup");
  if (popup) {
    setTimeout(function () {
      popup.remove();
    }, 3000);
  }

  var remove_pedal_forms = document.querySelectorAll(".remove_pedal_form");
  for (var i = 0; i < remove_pedal_forms.length; i++) {
    remove_pedal_forms[i].addEventListener("submit", function (e) {
      e.preventDefault();
      var confirm = window.confirm(
        "Are you sure you want to remove this item?"
      );
      if (!confirm) return;
      e.target.submit();
    });
  }

  var knob_form = document.getElementById("knob_form");
  var knob_form_inputs = document.getElementById("knob_form_inputs");
  var knobs = document.querySelectorAll(".knob");
  for (var i = 0; i < knobs.length; i++) {
    console.log(knobs[i]);
    var knob = new PrecisionInputs.FLStandardKnob(knobs[i], {
      color: knobs[i].dataset.color,
      min: parseInt(knobs[i].dataset.min),
      max: parseInt(knobs[i].dataset.max),
      step: parseInt(knobs[i].dataset.step),
      initial: parseInt(knobs[i].dataset.knobValue),
    });
    knob.addEventListener("blur", function (e) {
      knob_form_inputs.innerHTML =
        '<input type="hidden" name="pedal_id" value="' +
        this.parentElement.dataset.pedalId +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="knob_key" value="' +
        this.parentElement.dataset.knobKey +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="value" value="' + e.target.value + '"/>';
      submitForm(this.parentElement.dataset.pedalId);
    });
  }

  function submitForm(pedal_id) {
    if(document.getElementById('show_all_pedals')) return;
    knob_form.action += "#" + pedal_id;
    knob_form.submit();
  }

  var add_pedal = document.getElementById("add_pedal");
  if (add_pedal) {
    var add_pedal_form = document.getElementById("add_pedal_form");
    add_pedal.addEventListener("change", function () {
      add_pedal_form.submit();
    });
  }

  var pickup_ranges = document.querySelectorAll(".pickup_range");
  for (var i = 0; i < pickup_ranges.length; i++) {
    pickup_ranges[i].addEventListener("change", function (e) {
      knob_form_inputs.innerHTML =
        '<input type="hidden" name="pedal_id" value="' +
        this.dataset.pedalId +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="knob_key" value="' +
        this.dataset.knobKey +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="value" value="' + e.target.value + '"/>';
      submitForm(this.dataset.pedalId);
    });
  }

  var option_btns = document.querySelectorAll(".option");
  for (var i = 0; i < option_btns.length; i++) {
    option_btns[i].addEventListener("click", function () {
      var value = this.dataset.knobValue === "1" ? "0" : "1";
      knob_form_inputs.innerHTML =
        '<input type="hidden" name="pedal_id" value="' +
        this.dataset.pedalId +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="knob_key" value="' +
        this.dataset.knobKey +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="value" value="' + value + '"/>';
      submitForm(this.dataset.pedalId);
    });
  }

  var text_inputs = document.querySelectorAll(".text_input");
  for (var i = 0; i < text_inputs.length; i++) {
    text_inputs[i].addEventListener("blur", function (e) {
      knob_form_inputs.innerHTML =
        '<input type="hidden" name="pedal_id" value="' +
        this.dataset.pedalId +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="knob_key" value="' +
        this.dataset.knobKey +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="value" value="' + e.target.value + '"/>';
      submitForm(this.dataset.pedalId);
    });
  }

  var note_inputs = document.querySelectorAll(".notes");
  for (var i = 0; i < note_inputs.length; i++) {
    note_inputs[i].addEventListener("blur", function (e) {
      knob_form_inputs.innerHTML =
        '<input type="hidden" name="pedal_id" value="' +
        this.dataset.pedalId +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="knob_key" value="' +
        this.dataset.knobKey +
        '"/>';
      knob_form_inputs.innerHTML +=
        '<input type="hidden" name="value" value="' + e.target.value + '"/>';
      submitForm(this.dataset.pedalId);
    });
  }
})();
