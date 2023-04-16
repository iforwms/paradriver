<div class="pedal_container">
    <?php if($pedal->type === 'wah'): ?>
        <div class="wah_outer">
            <div class="wah_inner">
                <span>VOX</span>
            </div>
        </div>
    <?php else: ?>
    <div class="pedal" style="background: <?= $pedal->background_colour ?>; border-color: <?= $pedal->label_colour ?>">
        <?php if(count($pedal->knobs)): ?>
            <?php foreach($pedal->knobs as $knob_row): ?>
                <div class="knob_container">
                    <?php foreach($knob_row as $knob): ?>
                        <?php include __DIR__ . "/knob.blade.php"; ?>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        <?php endif ?>

        <?php if(count($pedal->options)): ?>
        <div class="option_container">
            <?php foreach($pedal->options as $option): ?>
                <?php include __DIR__ . "/option.blade.php"; ?>
            <?php endforeach ?>
        </div>
        <?php endif ?>

        <?php if($pedal->pickup_selector): ?>
        <div class="pickup_container">
            <?php include __DIR__ . "/pickup_selector.blade.php" ?>
        </div>
        <?php endif ?>

        <?php if(property_exists($pedal, "show_notes") && $pedal->show_notes): ?>
        <div class="notes_container">
            <?php include __DIR__ . "/notes.blade.php" ?>
        </div>
        <?php endif ?>
    </div>
    <?php endif ?>
</div>
