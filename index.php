<?php

use Multiavatar\Multiavatar;

require_once "Multiavatar.php";

$multiAvatar = new Multiavatar();

$avatarId = "Starcrasher";
echo $multiAvatar($avatarId);

// Without the environment part
// $avatarId = "Pandalion";
// echo $multiAvatar($avatarId, true);

// Generate a specific version
// $avatarId = "Pandalion";
// echo $multiAvatar($avatarId, false, ["part" => 11, "theme" => "C"]);

// Test with integer
// $avatarId = 123456789;
// echo $multiAvatar($avatarId);

// $avatarId = "a86f755add37fe0b649c";
// echo $multiAvatar($avatarId);

// $avatarId = "f7542474d54d2d2d97e4";
// echo $multiAvatar($avatarId);
