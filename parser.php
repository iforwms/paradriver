<?php

$updated = false;

function dd(...$args)
{
    echo "<pre>";
    var_dump($args);
    die();
}

function sort_chain(array $chain)
{
    $unique = [];
    foreach ($chain as $pedal) {
        $index = array_search($pedal["id"], PEDAL_ORDER);
        $in_array = count(
            array_filter($unique, function ($item) use ($pedal) {
                return $item["id"] === $pedal["id"];
            })
        );
        if ($in_array) {
            continue;
        }
        $unique[$index] = $pedal;
    }
    ksort($unique);
    return array_values($unique);
}
function setting(object $pedal, string $key, $default = 0)
{
    return isset($pedal->settings[$key]) ? $pedal->settings[$key] : $default;
}

const PEDAL_ORDER = [
    "hartke_500",
    "big_sky",
    "mooer_reverb",
    "mooer_delay",
    "marshall_cab",
    "marshall_dirty",
    "marshall_clean",
    "paradriver",
    "mxr_compressor",
    "mxr_filter",
    "mxr_chorus",
    "mxr_octave",
    "wah",
    "acoustic",
    "fender_jazz",
    "les_paul",
    "fender_strat",
];

$DB_PATH = __DIR__ . "/db";
$db = array_values(array_diff(scandir($DB_PATH), [".", "..", ".gitkeep"]));

if (
    isset($_POST) &&
    isset($_POST["form_action"]) &&
    $_POST["form_action"] === "create" &&
    isset($_POST["name"]) &&
    $_POST["name"] &&
    !in_array($_POST["name"] . ".json", $db)
) {
    $new_preset = [
        "name" => ($name = ucwords($_POST["name"])),
        "chain" => [],
    ];
    file_put_contents(
        "{$DB_PATH}/{$_POST["name"]}.json",
        json_encode($new_preset)
    );
    header("Location: /?song={$name}");
} elseif (isset($_POST) && isset($_POST["filename"])) {
    if (file_exists("{$DB_PATH}/{$_POST["filename"]}")) {
        $song_data = json_decode(
            file_get_contents("{$DB_PATH}/{$_POST["filename"]}"),
            true
        );
        switch ($_POST["form_action"]) {
            case "update":
                foreach ($song_data["chain"] as $index => $pedal) {
                    if ($pedal["id"] !== $_POST["pedal_id"]) {
                        continue;
                    }
                    $song_data["chain"][$index]["settings"][
                        $_POST["knob_key"]
                    ] = $_POST["value"];
                }
                break;
            case "add":
                $song_data["chain"][] = [
                    "id" => $_POST["pedal"],
                ];
                break;
            case "remove":
                $song_data["chain"] = array_filter(
                    $song_data["chain"],
                    function ($item) {
                        return $item["id"] !== $_POST["pedal_id"];
                    }
                );
                break;
            default:
                dd("Unsupported action.");
        }
        $song_data["chain"] = sort_chain($song_data["chain"]);
        file_put_contents(
            "{$DB_PATH}/{$_POST["filename"]}",
            json_encode($song_data)
        );
        $updated = true;
    }
}

$pedals = json_decode(file_get_contents(__DIR__ . "/pedals.json"))->data;
usort($pedals, fn($a, $b) => strcmp($a->type, $b->type));

function lookup($pedal_settings)
{
    global $pedals;
    $search = array_values(
        array_filter($pedals, function ($item) use ($pedal_settings) {
            return $item->id === $pedal_settings["id"];
        })
    );
    if (!count($search)) {
        throw new Exception("Pedal not found.");
    }
    $pedal = $search[0];
    $pedal->settings = $pedal_settings["settings"] ?? [];
    return $pedal;
}

$data = [];
foreach ($db as $song) {
    $song_data = json_decode(file_get_contents("{$DB_PATH}/{$song}"), true);
    $song_data["filename"] = $song;
    $data[] = $song_data;
}

$query_song = [
    "name" => "ALL",
    "chain" => array_map(fn($i) => ["id" => $i->id], $pedals),
];
if (isset($_GET["song"])) {
    $songs = array_values(
        array_filter($data, function ($item) {
            return $item["name"] === $_GET["song"];
        })
    );
    if (count($songs)) {
        $query_song = $songs[0];
    }
}

$pedal_dropdown = [];
$unused_pedal_count = 0;
$chain_ids = array_map(fn($item) => $item["id"], $query_song["chain"]);
foreach ($pedals as $pedal) {
    if (in_array($pedal->id, $chain_ids)) {
        continue;
    }
    if (!isset($pedal_dropdown[$pedal->type])) {
        $pedal_dropdown[$pedal->type] = [];
    }
    $pedal_dropdown[$pedal->type][] = $pedal;
    $unused_pedal_count++;
}
