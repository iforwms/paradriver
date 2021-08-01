<?php
$presets = json_decode(file_get_contents(__DIR__ . "/presets.json"), true); ?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>
body {
color: #f3c200;
padding: 0;
margin: 0;
font-family: sans-serif;
font-weight: 600;
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
h2 {
margin-top: 0;
text-transform: uppercase;
font-size: 1.1em;
margin-bottom: .25em;
color: #282a2e;
}
</style>
</head>
<body>
<?php foreach ($presets as $preset): ?>
<div style="padding: 1em;">
    <?php include __DIR__ . "/pedal.blade.php"; ?>
</div>
<?php endforeach; ?>
</body>
</html>
