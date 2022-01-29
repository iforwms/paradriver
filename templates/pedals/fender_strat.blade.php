<?php $indicator_colour = "#c8c188"; $knob_colour = "#4a433c"; $background = "#f6f0d6"; $label_colour = $knob_colour; ?>
<div class="pedal_container">
    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Volume"; $key = 'neck_pickup'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $key = 'bridge_pickup'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $key = 'tone'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="pickup_container">
            <?php include __DIR__ . "/../pickup_selector.blade.php" ?>
        </div>
    </div>
</div>
