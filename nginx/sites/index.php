<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RaspberryPi4</title>
    <link rel="icon" type="image/png" href="icon.png" />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <style>
        body {
            background-color: #0f0f0f;
            color: whitesmoke;
            font-family: 'Roboto', sans-serif;
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0px;
        }

        .card {
            margin: 8px;
            background-color: #242424;
            min-width: 150px;
            width: auto;
            height: 100px;
            border-radius: 20px;
            box-sizing: border-box;
            padding: 30px;
            display: table;
            cursor: pointer;
            font-size: 16px;
        }

        .card:hover {
            background-color: #333333;
            font-size: 17px;
        }

        .title {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }
    </style>
</head>

<body id="body" class="body">

    <?php
    $srcFolder = "src/";

    function getFolders()
    {
        global $srcFolder;
        return array_diff(scandir($srcFolder), array('.', '..'));
    }

    function createCard($title, $link)
    {
        return '<div class="card" onclick="location.href=\'' . $link . '\';"><h2 class="title">' . $title . '</h2></div>';
    }

    function empty_warning()
    {
        return '<div class="card"><h2 class="title">Empty</h2></div>';
    }



    $folders = getFolders();
    $error = false;

    if (count($folders) != 0) {

        foreach ($folders as $folder) {
            $title = $folder;
            $link = $srcFolder . $folder;
            echo createCard($title, $link);
        }
    } else {
        echo empty_warning();
    }
    ?>
</body>

</html>