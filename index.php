<?php

function dd(...$args) {
    var_dump($args);
    die();
}

function setting(array $pedal, string $name, $default = 0) {
    return isset($pedal['settings'][$name]) ? $pedal['settings'][$name] : $default;
}

$db_path = __DIR__ . "/db";
$db = array_values(array_diff(scandir($db_path), ['.', '..', '.gitkeep']));

$data = [];
foreach($db as $song) {
    $data[] = json_decode(file_get_contents("{$db_path}/{$song}"), true);
}

$query_song = $data[0];
if(isset($_GET['song'])) {
    $songs = array_values(array_filter($data, function($item) {
        return $item['name'] === $_GET['song'];
    }));
    if(count($songs)) {
        $query_song = $songs[0];
    }
}
?>

<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Pedal Board Presets</title>
<link rel="stylesheet" href="style.css">
</head>
<body style="margin: 0; padding: 0;">
    <div style="padding: 0 1em;">
        <ul style="list-style-type: none; padding: 0; display: flex; flex-wrap: wrap;">
        <?php foreach($data as $song): ?>
            <li style="font-size: .9em; padding: .5em; background-color: #eee; border-radius: 3px; margin: .25em; white-space: nowrap;"><a style="color: #555; text-decoration: none;" href="<?= "/?song={$song['name']}" ?>"><?= $song['name'] ?></a></li>
        <?php endforeach ?>
        </ul>
    </div>

    <?php if(!is_null($query_song)): ?>
        <div style="margin: 1em; border: 1px solid #aaa; border-radius: 4px;">
        <h3 style="border-top-left-radius 3px; border-top-right-radius: 3px; padding: 1em; background-color: #255ee3; margin-bottom: 0; color: #fff;"><?= $query_song["name"] ?><?= isset($query_song['time_Signature']) ? " - {$query_song['time_Signature']}" : "" ?><?= isset($query_song['tempo']) ? " - {$query_song['tempo']} bpm" : "" ?></h3>
            <div style="padding: 1em; display: flex; flex-wrap: wrap;">
            <?php foreach ($query_song["chain"] as $pedal): ?>
                <?php if (
                    file_exists(__DIR__ . "/templates/pedals/{$pedal["id"]}.blade.php")
                ): ?>
                    <div style="margin-bottom: 1em;">
                        <?php include __DIR__ .  "/templates/pedals/{$pedal["id"]}.blade.php"; ?>
                    </div>
                <?php else: ?>
                    <?php include __DIR__ . "/templates/pedals/missing.blade.php"; ?>
                <?php endif ?>
            <?php endforeach ?>
            </div>
        </div>
<?php endif ?>
</body>
</html>
