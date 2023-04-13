<?php

require_once __DIR__ ."/helpers.php";

$DB_PATH = __DIR__ . "/db";
$db = array_values(array_diff(scandir($DB_PATH), [".", "..", ".gitkeep"]));
$all_pedals = json_decode(file_get_contents(__DIR__ . "/pedals.json"))->data;

$pedals = array_filter(
    $all_pedals,
    fn($item) => $item->active
);
usort($pedals, "pedal_sort_func");
usort($all_pedals, "pedal_sort_func");
$pedal_order = array_map(fn($item) => $item->id, $all_pedals);

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

require_once __DIR__ . "/handle_post.php";
