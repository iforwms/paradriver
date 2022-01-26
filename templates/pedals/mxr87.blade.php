<?php $indicator_colour = "#fff"; $knob_colour = "#000"; $background = "#fff"; $label_colour = $knob_colour;  ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Release"; $key = 'release'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Attack"; $key = 'attack'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Ratio"; $key = 'ratio'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Output"; $key = 'output'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Input"; $key = 'input'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
    </div>
</div>
