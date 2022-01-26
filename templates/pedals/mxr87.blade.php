<?php $indicator_colour = "#fff"; $knob_colour = "#000"; $background = "#fff"; $label_colour = $knob_colour;  ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Release"; $value = setting($pedal, 'release'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Attack"; $value = setting($pedal, 'attack'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Ratio"; $value = setting($pedal, 'ratio'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Output"; $value = setting($pedal, 'output'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Input"; $value = setting($pedal, 'input'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>
    </div>
</div>
