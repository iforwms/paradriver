<?php $value = setting($pedal, $knob->key) ?>
<div class="effect">
    <label class="knob_label" style="color: <?= $pedal->label_colour ?>"><?= $knob->label; ?></label>
    <div
        data-knob-key="<?= $knob->key ?>"
        data-pedal-id="<?= $pedal->id ?>"
        data-knob-value="<?= $value; ?>"
        data-color="<?= $pedal->indicator_colour ?>"
        data-min="<?= property_exists($knob, 'min') ? $knob->min : 0 ?>"
        data-max="<?= property_exists($knob, 'max') ? $knob->max : 100 ?>"
        data-step="<?= property_exists($knob, 'step') ? $knob->step : 1 ?>"
        class="knob"
        ></div>
</div>

