<div class="effect">
    <label style=""><?= $title; ?></label>
    <div style="transform: rotate(<?= $value; ?>deg);" class="knob">
        <div class="indicator" style="<?= isset($indicator_colour) ? "background-color: $indicator_colour;" : ""; ?>"></div>
    </div>
</div>

