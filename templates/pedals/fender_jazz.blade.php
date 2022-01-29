<?php $indicator_colour = "#a45610"; $knob_colour = "#301803"; $background = "radial-gradient(#ff5400, #974a04)"; $label_colour = $knob_colour; ?>
<div class="pedal_container">
    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>;">
        <div class="knob_container">
            <?php $title = "Neck"; $key = 'neck_pickup'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bridge"; $key = 'bridge_pickup'; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $key = 'tone'; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="option_container">
            <?php $title = "Humbucker"; $key = 'humbucker'; include __DIR__ . "/../option.blade.php"; ?>
            <?php $title = "Sponge"; $key = 'sponge'; include __DIR__ . "/../option.blade.php"; ?>
        </div>
    </div>
</div>
