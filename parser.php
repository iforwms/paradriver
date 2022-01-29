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

if(isset($_POST) && isset($_POST['action']) && $_POST['action'] === 'create' && isset($_POST['name']) && $_POST['name'] && !in_array($_POST['name'] . ".json", $db)) {
    $new_preset = [
        'name' => $name = ucwords($_POST['name']),
        'chain' => [],
    ];
    file_put_contents("{$db_path}/{$_POST['name']}.json", json_encode($new_preset));
    header("Location: /?song={$name}");
}
elseif(isset($_POST) && isset($_POST['filename'])){
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

foreach($query_song['chain'] as $pedal) {
    unset($pedals[$pedal['id']]);
}
unset($pedals['']);

