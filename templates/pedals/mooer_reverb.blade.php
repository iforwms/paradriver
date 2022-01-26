<?php $indicator_colour = "#0abd0a"; $knob_colour = "#171717"; $background = "#282a2e"; $label_colour = $indicator_colour;  ?>
<div class="pedal_container">
    <h4 class="pedal_name"><?= $pedal['name']; ?></h4>

    <div class="pedal" style="background: <?= $background ?>; border-color: <?= $knob_colour ?>">
        <div class="knob_container">
            <?php $title = "Tone"; $value = setting($pedal, 'tone'); include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Decay"; $value = setting($pedal, 'decay'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <?php $title = "Mix"; $value = setting($pedal, 'mix'); include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div class="knob_container">
            <div class="effect">
                <label class="knob_label" style="color: <?= $label_colour ?>">Tempo</label>
                <div style="color: <?= $label_colour ?>; font-weight: normal; font-size: .9em; padding: 3px 6px; border: 1px solid <?= $indicator_colour ?>; border-radius: 3px;"><?= $pedal['settings']['tempo'] ?></div>
            </div>
        </div>
    </div>
</div>