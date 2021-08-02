<?php
$data = [];
$entries = json_decode(file_get_contents(__DIR__ . "/presets.json"), true);
foreach ($entries as $entry) {
    $data[$entry["instrument"]][] = $entry;
}
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Pedal Board Presets</title>
<style>
body {
background-color: #f9f9f9;
color: #282a2e;
padding: 0;
margin: 0;
font-family: sans-serif;
font-weight: 600;
}
.paradriver {
color: #f3c200;
}
.button {
margin-left: .5em;
background-color: #171717;
height: 18px;
width: 18px;
display: flex;
justify-content: center;
align-items: center;
border-radius: 48px;
border: 1px solid #000;
}
.knob {
margin-top: .5em;
background-color: #171717;
height: 48px;
width: 48px;
display: flex;
justify-content: center;
align-items: center;
border-radius: 48px;
border: 1px solid #000;
position: relative;
}
.fender_strat label {
color: #6a6447;
}
.fender_jazz label {
color: #301803;
}
.indicator {
width: 3px;
background-color: #f3c200;
top: 0;
height: 16px;
position: absolute;
}
.effect {
margin: 0 .5em;
display: flex;
align-items: center;
flex-direction: column;
}
.box {
/* box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); */
background-color: #282a2e;
padding: 1.5em 1em;
border-radius: 8px;
display: inline-block;
}
label {
font-size: .9em;
text-transform: uppercase;
}
h2, h3{
margin-top: 0;
text-transform: uppercase;
font-size: 1.1em;
margin-bottom: .25em;
color: #282a2e;
}
h2 {
background-color: #4980ee;
padding: 1em;
font-size: .7em;
margin-top: 1em;
color: #fff;
margin-bottom: 0;
}
h4 {
margin-top: .5em;
margin-bottom: .5em;
font-size: .8em;
color: #282a2e;
}
</style>
</head>
<body>
<?php foreach ($data as $instrument => $presets): ?>
<h2><?= $instrument ?></h2>

<?php foreach ($presets as $preset): ?>
<div style="margin: 1em; border: 1px solid #d5d5d5; border-radius: 4px; padding: 1em;">
    <h3><?= $preset['name'] ?></h3>
    <div style="display: flex;">
    <?php foreach($preset['chain'] as $pedal): ?>
        <?php if(file_exists(__DIR__ . "/templates/pedals/{$pedal['id']}.blade.php")): ?>
            <?php include __DIR__ . "/templates/pedals/{$pedal['id']}.blade.php"; ?>
        <?php else: ?>
            <?php include __DIR__ . "/templates/pedals/missing.blade.php"; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    </div>
</div>
<?php endforeach; ?>
<?php endforeach; ?>
</body>
</html>
