<?php $indicator_colour = "#a45610"; $knob_colour = "#301803"; $background = "radial-gradient(#eec795, #c88f5c)"; $label_colour = $knob_colour; ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Neck"; $key = 'neck_pickup'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bridge"; $key = 'bridge_pickup'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $key = 'tone'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
    </div>
</div>


