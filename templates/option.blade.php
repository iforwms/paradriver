<?php $value = setting($pedal, $option->key) ?>
<div
    class="option"
    data-pedal-id="<?= $pedal->id ?>"
    data-knob-key="<?= $option->key ?>"
    data-knob-value="<?= $value ?>"
>
    <label style="color: <?= $pedal->label_colour ?>" class="option_label"><?= $option->label ?></label>
    <div class="button" style="background-color: <?= $pedal->background_colour ?>;">
        <?php if($value): ?>
            <div class="option_indicator" style="background-color: <?= $pedal->indicator_colour ?>;"></div>
        <?php endif; ?>
    </div>
</div>

