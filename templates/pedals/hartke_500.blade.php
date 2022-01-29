<?php $indicator_colour = "#fff"; $knob_colour = "#000"; $background = "#282a2e"; $label_colour = $indicator_colour;  ?>
<div class="pedal_container">
    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Shape"; $key = 'shape'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bass"; $key = 'bass'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid"; $key = 'mid'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Treble"; $key = 'treble'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="option_container">
            <?php $title = "Shape On"; $key = 'shape_on'; include __DIR__ . "/../option.blade.php"; ?>
        </div>
    </div>
</div>

