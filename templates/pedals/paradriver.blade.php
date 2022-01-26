<?php $indicator_colour = "#f3c200"; $label_colour = $indicator_colour; $knob_colour = "#171717"; $background = "#282a2e"; ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Level"; $value = setting($pedal, 'level'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Treble"; $value = setting($pedal, 'Treble'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid"; $value = setting($pedal, 'mid'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bass"; $value = setting($pedal, 'bass'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Drive"; $value = setting($pedal, 'drive'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Blend"; $value = setting($pedal, 'blend'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid Shift"; $value = setting($pedal, 'mid_shift'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="option_container">
            <div class="option">
                <label style="color: <?= $label_colour ?>" class="option_label">Rumble Filter</label>
                <div class="button" style="background-color: <?= $knob_colour ?>;">
                    <?php if(setting($pedal, 'rumble')): ?>
                        <div class="option_indicator" style="background-color: <?= $indicator_colour ?>;"></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="option">
                <label style="color: <?= $label_colour ?>" class="option_label">Air</label>
                <div class="button" style="background-color: <?= $knob_colour ?>;">
                    <?php if(setting($pedal, 'air')): ?>
                        <div class="option_indicator" style="background-color: <?= $indicator_colour ?>;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
