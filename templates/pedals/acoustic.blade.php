<div class="fender_jazz">
    <h4><?= $pedal['name']; ?></h4>

    <div style="margin-right: 2em; flex-direction: column; text-align: center; line-height: 1.5; background: radial-gradient(#eec795, #c88f5c); border: 2px solid #623915; display: flex; justify-content: center; align-items: center; border-radius: 12px; padding: 0.6em;">
        <div style="display: flex;">
            <?php $title = "Neck"; $value = $pedal['settings']['neck_pickup']; $indicator_colour = "#a45610"; $knob_colour = "#301803"; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bridge"; $value = $pedal['settings']['bridge_pickup']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = $pedal['settings']['tone']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>
    </div>
</div>


