<div class="effect">
    <label class="knob_label" style="color: <?= $label_colour ?>"><?= $title ?></label>
    <input
        data-pedal-id="<?= $pedal['id'] ?>"
        data-knob-key="<?= 'tempo' ?>"
        data-knob-value="<?= $value ?>"
        type="text" name="value" class="text_input" style="background-color: <?= $background ?>; text-align: center; color: <?= $label_colour ?>; font-weight: normal; font-size: .9em; padding: 3px 6px; border: 0px solid <?= $indicator_colour ?>; border-radius: 3px;" value="<?= setting($pedal, 'tempo') ?>"/>
</div>

