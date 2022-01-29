<?php $indicator_colour = "#ffa500"; $knob_colour = "#171717"; $background = "#282a2e"; $label_colour = $indicator_colour;  ?>
<div class="pedal_container">
    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Time"; $key = 'time'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Feedback"; $key = 'feedback'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Level"; $key = 'level'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Tempo"; $key = 'tempo'; include __DIR__ . "/../text.blade.php"; ?>
        </div>
    </div>
</div>
