<?php $indicator_colour = "#a45610"; $knob_colour = "#301803"; $background = "radial-gradient(#ff5400, #974a04)"; ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>;">
        <div class="knob_container">
            <?php $title = "Neck"; $value = setting($pedal, 'neck_pickup'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bridge"; $value = setting($pedal, 'bridge_pickup'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = setting($pedal, 'tone'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="option_container">
            <div class="option">
                <label style="color: <?= $knob_colour ?>" class="option_label">Humbucker</label>
                <div class="button" style="background-color: <?= $knob_colour ?>;">
                    <?php if(setting($pedal, 'humbucker')): ?>
                        <div class="option_indicator" style="background-color: <?= $indicator_colour ?>;"></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="option">
                <label style="color: <?= $knob_colour ?>" class="option_label">Sponge</label>
                <div class="button" style="background-color: <?= $knob_colour ?>;">
                    <?php if(setting($pedal, 'sponge')): ?>
                        <div class="option_indicator" style="background-color: <?= $indicator_colour ?>;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
