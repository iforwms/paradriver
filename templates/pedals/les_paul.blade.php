<?php $indicator_colour = "#4a433c"; $knob_colour = "#fff"; $background = "radial-gradient(#09b36b, #00240c)"; $label_colour = $knob_colour; ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Volume"; $value = setting($pedal, 'neck_pickup'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = setting($pedal, 'bridge_pickup'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = setting($pedal, 'tone'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div class="pickup_container">
            <div class="">
                <label style="color: <?= $label_colour ?>" class="option_label">Pickup Selector (B/M/N)</label>
                <div class="pickup_selector">
                    <div>
                        <div class="pickup_range" style="background-color: <?= $knob_colour ?>"></div>
                        <!-- Bridge: 0, B/M: 20, Mid: 40, M/N: 60, Neck: 80 -->
                        <div class="pickup_selector_btn" style=" background-color: <?= $knob_colour ?>; left: <?= setting($pedal, 'pickup_selector') ?>px; "
                        ></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
