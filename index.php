<?php require_once __DIR__ . "/parser.php"; ?>

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

    <link rel="stylesheet" href="/assets/precision-inputs.css">
    <script src="/assets/precision-inputs.js"></script>
</head>
<body>
    <div class="menu">
        <button class="menu_btn" id="toggle_menu">MENU</button>

        <div class="create_new_preset_container">
            <form action="/?song=<?= $query_song['name'] ?>" method="POST">
                <input type="hidden" name="action" value="create"/>
                <input type="text" placeholder="Enter filename" name="name"/>
                <button class="btn new_preset_btn" id="new_preset_btn">Add</button>
            </form>
        </div>

        <ul>
            <?php foreach($data as $song): ?>
                <li><a href="<?= "/?song={$song['name']}" ?>"><?= $song['name'] ?> (<?= count($song['chain']) ?>)</a></li>
            <?php endforeach ?>
        </ul>
    </div>

    <?php if($updated): ?>
        <div id="popup" class="popup">Changes saved!</div>
    <?php endif ?>

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
                            <option disabled selected>Add to Chain</option>
                            <?php foreach($pedal_dropdown as $type => $pedals_list): ?>
                            <optgroup label="<?= str_replace('Di', 'DI', ucwords($type)) ?>s">
                                <?php foreach($pedals_list as $pedal_item): ?>
                                    <option value="<?= $pedal_item->id ?>"><?= $pedal_item->name ?></option>
                                <?php endforeach ?>
                                </optgroup>
                            <?php endforeach ?>
                        </select>
                    </form>
                </div>
            </div>

            <div style="padding: 1em 1em 0; display: flex; flex-wrap: wrap;">
                <?php foreach ($query_song["chain"] as $pedal_settings): ?>
                    <?php $pedal = lookup($pedal_settings) ?>
                        <div style="margin-bottom: 1em;">
                            <div style="display: flex; justify-content: space-between; align-items: center; margin-right: 1em;">
                                <h4 class="pedal_name"><?= $pedal->name ?></h4>
                                <form action="/?song=<?= $query_song['name'] ?>" method="POST">
                                    <input type="hidden" value="remove" name="action"/>
                                    <input type="hidden" value="<?= $pedal->id ?>" name="pedal_id"/>
                                    <input type="hidden" value="<?= $query_song['filename'] ?? "" ?>" name="filename"/>
                                    <button class="btn" style="padding: .25em; background-color: transparent; color: red;">&#x2715</button>
                                </form>
                            </div>
                            <?php include __DIR__ .  "/templates/pedal.blade.php" ?>
                        </div>
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

        <form id="knob_form" class="hidden" action="/?song=<?= $query_song['name'] ?>" method="POST">
            <div id="knob_form_inputs"></div>
            <input type="hidden" value="update" name="action"/>
            <input type="hidden" value="<?= $query_song['filename'] ?? "" ?>" name="filename"/>
        </form>

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

    <script src="/assets/main.js"></script>
</body>
</html>
