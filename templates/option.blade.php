<?php $value = setting($pedal, $key) ?>
<div
    class="option"
    data-pedal-id="<?= $pedal['id'] ?>"
    data-knob-key="<?= $key ?>"
    data-knob-value="<?= $value ?>"
>
    <label style="color: <?= $label_colour ?>" class="option_label"><?= $title ?></label>
    <div class="button" style="background-color: <?= $knob_colour ?>;">
        <?php if($value): ?>
            <div class="option_indicator" style="background-color: <?= $indicator_colour ?>;"></div>
        <?php endif; ?>
    </div>
</div>

