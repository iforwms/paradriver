<div class="les_paul">
    <h4><?= $pedal['name']; ?></h4>

    <div style="margin-right: 2em; flex-direction: column; text-align: center; line-height: 1.5; background: radial-gradient(#09b36b, #00240c); border: 2px solid #002212; display: flex; justify-content: center; align-items: center; border-radius: 12px; padding: 0.6em;">
        <div style="display: flex;">
            <?php $title = "Volume"; $value = $pedal['settings']['neck_pickup']; $indicator_colour = "#4a433c"; $knob_colour = "#f4f4f3"; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = $pedal['settings']['bridge_pickup']; include __DIR__ . "/../knob.blade.php"; ?>
            <?php $title = "Tone"; $value = $pedal['settings']['tone']; include __DIR__ . "/../knob.blade.php"; ?>
        </div>

        <div style="flex-direction: column; display: flex; margin-top: 1.5em;">
            <label>Pickup Selector (B/M/N)</label>
            <div style="display: flex; align-items: center; justify-content: center; padding-bottom: .5em; padding-top: .5em; margin-top: .25em;">
                <div style="position: relative;">
                <div style="height: 2px; width: 100px; background-color: #002212;"></div>
                <!-- Bridge: 0, B/M: 20, Mid: 40, M/N: 60, Neck: 80 -->
                <div style="height: 18px; width: 18px; position: absolute; top: -9px; border-radius: 18px; left: 80px; border: 1px solid #000; background-color: #f4f4f3;"></div>
            </div>
            </div>
        </div>
    </div>
</div>



