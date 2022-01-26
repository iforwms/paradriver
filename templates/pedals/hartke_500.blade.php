<?php $indicator_colour = "#fff"; $knob_colour = "#000"; $background = "#282a2e"; $label_colour = $indicator_colour;  ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Shape"; $value = setting($pedal, 'shape'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bass"; $value = setting($pedal, 'bass'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid"; $value = setting($pedal, 'mid'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Treble"; $value = setting($pedal, 'treble'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="option_container">
            <div class="option">
                <label style="color: <?= $label_colour ?>" class="option_label">Shape On</label>
                <div class="button" style="background-color: <?= $knob_colour ?>;">
                    <?php if(setting($pedal, 'shape_on')): ?>
                        <div class="option_indicator" style="background-color: <?= $indicator_colour ?>;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

