<?php

function dd(...$args)
{
    echo "<pre>";
    var_dump($args);
    die();
}

function sort_chain(array $chain, $pedal_order)
{
    $unique = [];
    foreach ($chain as $pedal) {
        $index = array_search($pedal["id"], $pedal_order);
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

function pedal_sort_func($a, $b)
{
    if ($a->row === $b->row) {
        return $a->col - $b->col;
    }
    return strcmp($a->row, $b->row);
}

function lookup($pedal_settings, $all_pedals)
{
    $search = array_values(
        array_filter($all_pedals, function ($item) use ($pedal_settings) {
            return $item->id === $pedal_settings["id"];
        })
    );
    if (!count($search)) {
        return (object) [
            "name" => "Missing Pedal ({$pedal_settings["id"]})",
            "type" => "MISSING",
            "knobs" => [],
            "options" => [],
            "pickup_selector" => false,
            "row" => 1,
        ];
        throw new Exception("Pedal not found.");
    }
    $pedal = $search[0];
    $pedal->settings = $pedal_settings["settings"] ?? [];
    return $pedal;
}
