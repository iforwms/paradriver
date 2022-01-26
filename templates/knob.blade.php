<div class="effect">
    <label style="color: <?= $knob_colour ?>"><?= $title; ?></label>
    <div style="transform: rotate(<?= $value; ?>deg); <?= isset($knob_colour) ? "background-color: $knob_colour" : ''; ?>" class="knob">
        <div class="indicator" style="<?= isset($indicator_colour) ? "background-color: $indicator_colour;" : ""; ?>"></div>
    </div>
</div>

