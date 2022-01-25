<?php $knob_colour = "#171717"; ?>

<div class="paradriver">
    <h4><?= $pedal['name']; ?></h4>

    <div class="box" style="margin-right: 2em;">
        <div style="display: flex;">
            <?php $indicator_colour = "#f3c200"; $title = "Level"; $value = $pedal['settings']['level']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Treble"; $value = $pedal['settings']['treble']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid"; $value = $pedal['settings']['mid']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bass"; $value = $pedal['settings']['bass']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Drive"; $value = $pedal['settings']['drive']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div style="justify-content: center; margin-top: 1.5em; display: flex;">
            <?php $title = "Blend"; $value = $pedal['settings']['blend']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Mid Shift"; $value = $pedal['settings']['mid_shift']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div style="margin-top: 1em; margin-left: .5em; display: flex;">
            <div class="" style="align-items: center; display: flex; flex-direction: row;">
                <label style="font-size: .7em;">Rumble Filter</label>
                <div class="button">
                    <?php if($pedal['settings']['rumble'] === 1): ?>
                    <div style="height: 6px; width: 6px; border-radius: 100%; background-color: #f3c200;"></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="" style="margin-left: 1em; align-items: center; display: flex; flex-direction: row;">
                <label style="font-size: .7em;">Air</label>
                <div class="button">
                    <?php if($pedal['settings']['air'] === 1): ?>
                    <div style="height: 6px; width: 6px; border-radius: 100%; background-color: #f3c200;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
