<?php $value = $pedal->settings['notes'] ?? ""; ?>
<div class="">
    <label class="knob_label" style="color: <?= $pedal->label_colour ?>">Notes</label>
    <div>
        <textarea
        data-knob-key="notes"
        data-pedal-id="<?= $pedal->id ?>"
        data-knob-value="<?= $value; ?>"
        data-color="<?= $pedal->indicator_colour ?>"
        class="notes"
        placeholder="Type some notes if you want..."
        ><?= $value; ?></textarea>
    </div>
</div>


