<?php

function dd(...$args) {
    echo "<pre>";
    var_dump($args);
    die();
}

function sort_chain(array $chain) {
    $unique = [];
    foreach($chain as $pedal) {
        $index = array_search($pedal['id'], PEDAL_ORDER);
        $in_array = count(array_filter($unique, function($item) use ($pedal) {
            return $item['id'] === $pedal['id'];
        }));
        if($in_array) continue;
        $unique[$index] = $pedal;
    }
    ksort($unique);
    return array_values($unique);
}
function setting(array $pedal, string $name, $default = 0) {
    return isset($pedal['settings'][$name]) ? $pedal['settings'][$name] : $default;
}

const PEDAL_ORDER = [
    'hartke_500', 'fender_strat', 'les_paul', 'fender_jazz', 'acoustic', 'wah', 'mxr87', 'paradriver', 'marshall_clean', 'marshall_dirty', 'marshall_cab', 'mooer_delay', 'mooer_reverb',
];
$db_path = __DIR__ . "/db";
$db = array_values(array_diff(scandir($db_path), ['.', '..', '.gitkeep']));

if(isset($_POST) && isset($_POST['filename'])){
    if(file_exists("{$db_path}/{$_POST['filename']}")) {
        $song_data = json_decode(file_get_contents("{$db_path}/{$_POST['filename']}"), true);
        switch($_POST['action']) {
            case "update":
                foreach($song_data['chain'] as $index => $pedal) {
                    if($pedal['id'] !== $_POST['pedal_id']) continue;
                    $song_data['chain'][$index]['settings'][$_POST['knob_key']] = $_POST['value'];
                }
                break;
            case "add":
                $pedal_data = explode("|", $_POST['pedal']);
                $song_data['chain'][] = [
                    'id' => $pedal_data[0],
                    'name' => $pedal_data[1],
                ];
                break;
            case "remove":
                $song_data['chain'] = array_filter($song_data['chain'], function($item) {
                    return $item['id'] !== $_POST['pedal_id'];
                });
                break;
            default:
                dd("Unsupported action.");
        }
        $song_data['chain'] = sort_chain($song_data['chain']);
        file_put_contents("{$db_path}/{$_POST['filename']}", json_encode($song_data));
    }
}

$pedals = [];
$data = [];
foreach($db as $song) {
    $song_data = json_decode(file_get_contents("{$db_path}/{$song}"), true);
    $song_data['filename'] = $song;
    $data[] = $song_data;
    foreach($song_data['chain'] as $pedal) {
        $pedals[$pedal['id']] = $pedal['name'];
    }
}
ksort($pedals);

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
            <div class="setup_name">
                <h3><?= $query_song["name"] ?><?= isset($query_song['time_Signature']) ? " - {$query_song['time_Signature']}" : "" ?><?= isset($query_song['tempo']) ? " - {$query_song['tempo']} bpm" : "" ?></h3>
                <div style="">
                    <form id="add_pedal_form" action="/?song=<?= $query_song['name'] ?>" method="POST">
                        <input type="hidden" value="add" name="action"/>
                        <input type="hidden" value="<?= $query_song['filename'] ?? "" ?>" name="filename"/>
                        <select name="pedal" id="add_pedal">
                            <option disabled selected>Add a Pedal</option>
                            <?php foreach($pedals as $id => $name): ?>
                                <option value="<?= $id ?>|<?= $name ?>"><?= $name ?></option>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
            </div>

            <div style="padding: 1em 1em 0; display: flex; flex-wrap: wrap;">
            <?php foreach ($query_song["chain"] as $pedal): ?>
                <?php if (file_exists(__DIR__ . "/templates/pedals/{$pedal["id"]}.blade.php")): ?>
                    <div style="margin-bottom: 1em;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-right: 1em;">
                            <h4 class="pedal_name"><?= $pedal['name']; ?></h4>
                            <form action="/?song=<?= $query_song['name'] ?>" method="POST">
                                <input type="hidden" value="remove" name="action"/>
                                <input type="hidden" value="<?= $pedal['id'] ?>" name="pedal_id"/>
                                <input type="hidden" value="<?= $query_song['filename'] ?? "" ?>" name="filename"/>
                                <button class="btn" style="padding: .25em; background-color: transparent; color: red;">&#x2715</button>
                            </form>
                        </div>
                        <?php include __DIR__ .  "/templates/pedals/{$pedal["id"]}.blade.php" ?>
                    </div>
                <?php else: ?>
                    <?php include __DIR__ . "/templates/pedals/missing.blade.php" ?>
                <?php endif ?>
            <?php endforeach ?>
            </div>
        </div>

        <div id="mini_form" class="hidden mini_form_container">
            <form action="/?song=<?= $query_song['name'] ?>" method="POST">
                <div id="mini_form_close" class="mini_form_close_btn">&#x2715</div>
                <div id="mini_form_inputs"></div>
                <input class="value_input" name="value" id="value_input"/>
                <input type="hidden" value="update" name="action"/>
                <input type="hidden" value="<?= $query_song['filename'] ?? "" ?>" name="filename"/>
                <button class="btn" id="submit_btn">Update</button>
            </form>
        </div>

        <form action="/" method="POST" class="hidden">
            <div class="form-input">
                <label>Name</label>
                <input type="text" value="<?= $query_song['name'] ?? "" ?>" name="name"/>
            </div>
            <div class="form-input">
                <label>Ordering</label>
                <input type="number" step="1" min="0" value="<?= $query_song['ordering'] ?? "" ?>" name="ordering"/>
            </div>
            <div class="form-input">
                <label>Key</label>
                <input type="text" value="<?= $query_song['key'] ?? "" ?>" name="key"/>
            </div>
            <div class="form-input">
                <label>Time Signature</label>
                <input type="text" value="<?= $query_song['time_Signature'] ?? "" ?>" name="time_Signature"/>
            </div>
            <div class="form-input">
                <label>Tempo (bpm)</label>
                <input type="number" step="1" value="<?= $query_song['tempo'] ?? "" ?>" name="tempo"/>
            </div>

            <?php foreach($query_song['chain'] as $pedal): ?>
                <input type="hidden" name="tempo"/>
                <?php foreach($pedal as $a): ?>
                    <div><pre><?= var_dump($a) ?></div>
                <?php endforeach ?>
            <?php endforeach ?>
            <button class='submit_btn'>Update</button>
        </form>
<?php endif ?>
<script>
(function() {
var add_pedal = document.getElementById('add_pedal');
var add_pedal_form = document.getElementById('add_pedal_form');
add_pedal.addEventListener('change', function(e) {
    console.log('adding pedal', e.target.value);
    add_pedal_form.submit();
});

var btn = document.getElementById('toggle_menu');
btn.addEventListener('click', function() {
    document.body.classList.toggle('show_menu');
});

var knobs = document.querySelectorAll('.knob');
var mini_form = document.getElementById('mini_form');
var mini_form_close = document.getElementById('mini_form_close');
var value_input = document.getElementById('value_input');
mini_form_close.addEventListener('click', function() {
    mini_form.classList.add('hidden');
});
var submit_btn = document.getElementById('submit_btn');
submit_btn.addEventListener('click', function() {
    mini_form.classList.add('hidden');
});
for(var i = 0; i < knobs.length; i++) {
    knobs[i].addEventListener('click', function(e) {
        mini_form_inputs.innerHTML = '<input type="hidden" name="pedal_id" value="' + this.dataset.pedalId + '"/>';
        mini_form_inputs.innerHTML += '<input type="hidden" name="knob_key" value="' + this.dataset.knobKey + '"/>';
        value_input.type = 'number';
        value_input.setAttribute('min', 0);
        value_input.setAttribute('max', 350);
        value_input.setAttribute('step', 10);
        value_input.value = this.dataset.knobValue;
        mini_form.classList.remove('hidden');
    });
}
})();
</script>
</body>
</html>
