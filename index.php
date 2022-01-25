<?php
$data = [];
$db = json_decode(file_get_contents(__DIR__ . "/presets.json"), true);
foreach ($db as $entry) {
    $data[$entry["instrument"]][] = $entry;
}
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Pedal Board Presets</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php foreach ($data as $instrument => $presets): ?>
<h2><?= $instrument ?></h2>

<?php foreach ($presets as $preset): ?>
<div style="margin: 1em; border: 1px solid #d5d5d5; border-radius: 4px; padding: 1em;">
    <h3><?= $preset["name"] ?></h3>
    <div style="display: flex; flex-wrap: wrap;">
    <?php foreach ($preset["chain"] as $pedal): ?>
        <?php if (
            file_exists(__DIR__ . "/templates/pedals/{$pedal["id"]}.blade.php")
        ): ?>
            <?php include __DIR__ .
                "/templates/pedals/{$pedal["id"]}.blade.php"; ?>
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
