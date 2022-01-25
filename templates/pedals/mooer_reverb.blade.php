<?php
    $knob_colour = "#171717";
    $indicator_colour = "#0abd0a";
?>

<div>
    <h4><?= $pedal['name']; ?></h4>

    <div style="margin-right: 2em; flex-direction: column; text-align: center; line-height: 1.5; background-color: #282a2e; border: 2px solid <?= $indicator_colour ?>; color: <?= $indicator_colour ?>; display: flex; justify-content: center; align-items: center; border-radius: 12px; padding: 0.6em;">
        <div style="display: flex;">
            <?php $title = "Tone"; $value = $pedal['settings']['tone']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Decay"; $value = $pedal['settings']['decay']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div style="display: flex; margin-top: 1em;">
            <?php $title = "Mix"; $value = $pedal['settings']['mix']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
        <div style="display: flex; margin-top: 1em;">
            <div class="effect">
            <label style="">Tempo</label>
            <div style="font-weight: normal; font-size: .9em; padding: 3px 6px; border: 1px solid <?= $indicator_colour ?>; border-radius: 3px;"><?= $pedal['settings']['tempo'] ?></div>
        </div>
        </div>
    </div>
</div>
