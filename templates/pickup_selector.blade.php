<div class="">
    <label style="color: <?= $label_colour ?>" class="option_label">Pickup Selector (B/M/N)</label>
    <div class="pickup_selector">
        <input
            class="pickup_range"
            style="background-color: <?= $knob_colour ?>"
            data-pedal-id="<?= $pedal['id'] ?>"
            data-knob-key="<?= 'pickup_selector' ?>"
            data-knob-value="<?= setting($pedal, 'pickup_selector') ?>"
            value="<?= setting($pedal, 'pickup_selector') ?>"
            name="value" type="range" step="20" min="0" max="80"/>
    </div>
</div>

