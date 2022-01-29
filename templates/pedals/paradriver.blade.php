<?php $indicator_colour = "#f3c200"; $label_colour = $indicator_colour; $knob_colour = "#171717"; $background = "#282a2e"; ?>
<div class="pedal_container">
    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Level"; $key = 'level'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Treble"; $key = 'treble'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid"; $key = 'mid'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bass"; $key = 'bass'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Drive"; $key = 'drive'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Blend"; $key = 'blend'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid Shift"; $key = 'mid_shift'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="option_container">
            <?php $title = "Rumble Filter"; $key = 'rumble'; include __DIR__ . "/../option.blade.php"; ?>
            <?php $title = "Air"; $key = 'air'; include __DIR__ . "/../option.blade.php"; ?>
        </div>
    </div>
</div>
