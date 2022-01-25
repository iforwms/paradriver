<?php $knob_colour = "#000"; ?>

<div>
    <h4><?= $pedal['name']; ?></h4>

    <div style="margin-right: 2em; flex-direction: column; text-align: center; line-height: 1.5; background-color: #fff; border: 2px solid #333; color: #333; display: flex; justify-content: center; align-items: center; border-radius: 12px; padding: 0.6em;">
        <div style="display: flex;">
            <?php $title = "Release"; $value = $pedal['settings']['release']; $indicator_colour = "#fff"; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Attack"; $value = $pedal['settings']['attack']; $indicator_colour = "#fff"; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div style="display: flex; margin-top: 1em;">
            <?php $title = "Ratio"; $value = $pedal['settings']['ratio']; $indicator_colour = "#fff"; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div style="display: flex; margin-top: 1em;">
            <?php $title = "Output"; $value = $pedal['settings']['output']; $indicator_colour = "#fff"; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Input"; $value = $pedal['settings']['input']; $indicator_colour = "#fff"; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
    </div>
</div>
