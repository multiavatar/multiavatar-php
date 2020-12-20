<?php

use Multiavatar\Multiavatar;

require_once "autoload.php";

$multiavatar = new Multiavatar();

$avatarId = "Starcrasher";
echo $multiavatar($avatarId);

// Without the environment part
// $avatarId = "Pandalion";
// echo $multiavatar($avatarId, ['sansEnv' => true]);

// Generate a specific version
// $avatarId = "Pandalion";
// echo $multiavatar($avatarId, ['sansEnv' => false, 'ver' => ['part' => 11, 'theme' => 'C']]);

// Test with integer and a specific theme from any given version
// version theme are case insensitive
// $avatarId = 123456789;
// echo $multiavatar($avatarId, ['sansEnv' => false, 'ver' => ['theme' => 'b']]);

// Test with a specific part from any given version
// $avatarId = "a86f755add37fe0b649c";
// echo $multiavatar($avatarId, ['ver' => ['part' => '08']]);

// $avatarId = "f7542474d54d2d2d97e4";
// echo $multiavatar($avatarId);
