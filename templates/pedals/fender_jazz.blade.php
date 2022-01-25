<div class="fender_jazz">
    <h4><?= $pedal['name']; ?></h4>

    <div style="margin-right: 2em; flex-direction: column; text-align: center; line-height: 1.5; background: radial-gradient(#f48535, #241100); border: 2px solid #623915; display: flex; justify-content: center; align-items: center; border-radius: 12px; padding: 0.6em;">
        <div style="display: flex;">
            <?php $title = "Neck"; $value = $pedal['settings']['neck_pickup']; $indicator_colour = "#a45610"; $knob_colour = "#301803"; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Bridge"; $value = $pedal['settings']['bridge_pickup']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = $pedal['settings']['tone']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div style="width: 100%; margin-top: 1em; margin-left: .5em; display: flex;">
            <div class="" style="align-items: center; display: flex; flex-direction: row;">
                <label style="font-size: .7em;">Humbucker</label>
                <div class="button" style="background-color: #301803;">
                    <?php if($pedal['settings']['humbucker'] === 1): ?>
                    <div style="height: 6px; width: 6px; border-radius: 100%; background-color: #a45610;"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

