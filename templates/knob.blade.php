<?php $value = setting($pedal, $knob->key) ?>
<div class="effect">
    <label class="knob_label" style="color: <?= $pedal->label_colour ?>"><?= $knob->label; ?></label>
    <div
        data-knob-key="<?= $knob->key ?>"
        data-pedal-id="<?= $pedal->id ?>"
        data-knob-value="<?= $value; ?>"
        data-color="<?= $pedal->indicator_colour ?>"
        class="knob"
        ></div>
</div>

