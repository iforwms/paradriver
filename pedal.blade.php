<h2><?= $preset['name']; ?></h2>

<div class="box">
    <div style="display: flex;">
        <?php $title = "Level"; $value = $preset['level']; include __DIR__ . "/knob.blade.php"; ?>
        <?php $title = "Treble"; $value = $preset['treble']; include __DIR__ . "/knob.blade.php"; ?>
        <?php $title = "Mid"; $value = $preset['mid']; include __DIR__ . "/knob.blade.php"; ?>
        <?php $title = "Bass"; $value = $preset['bass']; include __DIR__ . "/knob.blade.php"; ?>
        <?php $title = "Drive"; $value = $preset['drive']; include __DIR__ . "/knob.blade.php"; ?>
    </div>

    <div style="justify-content: center; margin-top: 1.5em; display: flex;">
        <?php $title = "Blend"; $value = $preset['blend']; include __DIR__ . "/knob.blade.php"; ?>
        <?php $title = "Mid Shift"; $value = $preset['mid_shift']; include __DIR__ . "/knob.blade.php"; ?>
    </div>

    <div style="margin-top: 1em; margin-left: .5em; display: flex;">
        <div class="" style="align-items: center; display: flex; flex-direction: row;">
            <label style="font-size: .7em;">Rumble Filter</label>
            <div class="button">
                <?php if($preset['rumble'] === 1): ?>
                    <div style="height: 6px; width: 6px; border-radius: 100%; background-color: #f3c200;"></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="" style="margin-left: 1em; align-items: center; display: flex; flex-direction: row;">
            <label style="font-size: .7em;">Air</label>
            <div class="button">
                <?php if($preset['air'] === 1): ?>
                    <div style="height: 6px; width: 6px; border-radius: 100%; background-color: #f3c200;"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
