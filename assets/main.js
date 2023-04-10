(function() {

var knob_form = document.getElementById('knob_form');
var knob_form_inputs = document.getElementById('knob_form_inputs');
var knobs = document.querySelectorAll('.knob');
for(var i = 0; i < knobs.length; i++) {
    var knob = new PrecisionInputs.FLStandardKnob(knobs[i], {
        color: knobs[i].dataset.color,
        min: 0,
        max: 100,
        step: 1,
        initial: parseInt(knobs[i].dataset.knobValue)
    });
    knob.addEventListener('blur', function(e) {
        knob_form_inputs.innerHTML = '<input type="hidden" name="pedal_id" value="' + this.parentElement.dataset.pedalId + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="knob_key" value="' + this.parentElement.dataset.knobKey + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="value" value="' + e.target.value + '"/>';
        knob_form.submit();
    });
}

var add_pedal = document.getElementById('add_pedal');
var add_pedal_form = document.getElementById('add_pedal_form');
add_pedal.addEventListener('change', function(e) {
    add_pedal_form.submit();
});

var btn = document.getElementById('toggle_menu');
btn.addEventListener('click', function() {
    document.body.classList.toggle('show_menu');
});

var pickup_ranges = document.querySelectorAll('.pickup_range');
for(var i = 0; i < pickup_ranges.length; i++) {
    pickup_ranges[i].addEventListener('change', function(e) {
        knob_form_inputs.innerHTML = '<input type="hidden" name="pedal_id" value="' + this.dataset.pedalId + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="knob_key" value="' + this.dataset.knobKey + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="value" value="' + e.target.value + '"/>';
        knob_form.submit();
    });
}

var option_btns = document.querySelectorAll('.option');
for(var i = 0; i < option_btns.length; i++) {
    option_btns[i].addEventListener('click', function(e) {
        var value = this.dataset.knobValue === '1' ? "0" : "1";
        knob_form_inputs.innerHTML = '<input type="hidden" name="pedal_id" value="' + this.dataset.pedalId + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="knob_key" value="' + this.dataset.knobKey + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="value" value="' + value + '"/>';
        knob_form.submit();
    });
}

var text_inputs = document.querySelectorAll('.text_input');
for(var i = 0; i < text_inputs.length; i++) {
    text_inputs[i].addEventListener('blur', function(e) {
        knob_form_inputs.innerHTML = '<input type="hidden" name="pedal_id" value="' + this.dataset.pedalId + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="knob_key" value="' + this.dataset.knobKey + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="value" value="' + e.target.value + '"/>';
        knob_form.submit();
    });
}

var note_inputs = document.querySelectorAll('.notes');
for(var i = 0; i < note_inputs.length; i++) {
    note_inputs[i].addEventListener('blur', function(e) {
        knob_form_inputs.innerHTML = '<input type="hidden" name="pedal_id" value="' + this.dataset.pedalId + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="knob_key" value="' + this.dataset.knobKey + '"/>';
        knob_form_inputs.innerHTML += '<input type="hidden" name="value" value="' + e.target.value + '"/>';
        knob_form.submit();
    });
}
})();

