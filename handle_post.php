<?php

$updated = false;

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
        $song_data["chain"] = sort_chain($song_data["chain"], $pedal_order);
        file_put_contents(
            "{$DB_PATH}/{$_POST["filename"]}",
            json_encode($song_data)
        );
        $updated = true;
    }
}
