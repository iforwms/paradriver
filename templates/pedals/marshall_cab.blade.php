<?php
    $knob_colour = "#171717";
    $indicator_colour = "#fffc3c";
?>

<div>
    <h4><?= $pedal['name']; ?></h4>

    <div style="margin-right: 2em; flex-direction: column; text-align: center; line-height: 1.5; background-color: #282a2e; border: 2px solid #333; color: <?= $indicator_colour ?>; display: flex; justify-content: center; align-items: center; border-radius: 12px; padding: 0.6em;">
        <div style="display: flex;">
            <?php $title = "Treble"; $value = $pedal['settings']['treble']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid"; $value = $pedal['settings']['mid']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bass"; $value = $pedal['settings']['bass']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div style="display: flex; width: 100%; margin-top: 1em;">
            <?php $title = "Volume"; $value = $pedal['settings']['volume']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Gain"; $value = $pedal['settings']['gain']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
    </div>
</div>

