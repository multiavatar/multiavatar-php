<?php

use Multiavatar\Multiavatar;

require dirname(__DIR__).'/autoload.php';

$multiavatar = new Multiavatar();
$avatarList = [];
foreach (range(0, 15) as $part) {
    foreach (['a', 'b', 'c'] as $theme) {
        $avatarList[$part.'-'.$theme] = $multiavatar('a', ['ver'=> ['part' => $part, 'theme' => $theme]]);
    }
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <title>Multiavatar - All 48 Initial Avatar Designs</title>
        <style>
            body, html {
                width:100%;
                height:100%;
            }

            body {
                background-color: #fff;
                overflow-x: hidden;
                padding:0px;
                margin:0px;
            }

            * {
                box-sizing: border-box;
            }

            .container {
                width: 100%;
                height: 100%;
                padding: 20px;
            }

            .avatar {
                width: 110px;
                height:110px;
                float:left;
                margin: 10px;
            }
        </style>
    </head>
    <body>
        <div id="container" class="container">
            <?php foreach ($avatarList as $id => $svg): ?>
            <div id="<?=$id?>" class="avatar"><?=$svg?></div>
            <?php endforeach; ?>
        </div>
        <div style="height:40px;clear:both;"></div>
    </body>
</html>
