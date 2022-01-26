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
<link rel="apple-touch-icon" sizes="180x180" href="/assets/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon-16x16.png">
<link rel="manifest" href="/assets/site.webmanifest">
<link rel="mask-icon" href="/assets/safari-pinned-tab.svg" color="#000000">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">

<title>Ifor's Pedal Board Presets</title>
<link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <div class="menu">
        <button class="menu_btn" id="toggle_menu">MENU</button>
        <ul>
        <?php foreach($data as $song): ?>
            <li><a href="<?= "/?song={$song['name']}" ?>"><?= $song['name'] ?></a></li>
        <?php endforeach ?>
        </ul>
    </div>

    <h1>Ifor's Pedal Board</h1>

    <?php if(!is_null($query_song)): ?>
        <div class="setup_container">
        <h3 class="setup_name"><?= $query_song["name"] ?><?= isset($query_song['time_Signature']) ? " - {$query_song['time_Signature']}" : "" ?><?= isset($query_song['tempo']) ? " - {$query_song['tempo']} bpm" : "" ?></h3>
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
<script>
(function() {
var btn = document.getElementById('toggle_menu');
btn.addEventListener('click', function() {
    document.body.classList.toggle('show_menu');
});
})()
</script>
</body>
</html>
