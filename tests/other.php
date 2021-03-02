<?php

require_once("../Multiavatar.php");


//
// Deprecated (with __construct)
//
$avatarId = "Starcrasher";
$multiavatar = new Multiavatar($avatarId, null, null);
echo($multiavatar->svgCode);

$avatarId = "Pandalion";
$multiavatar = new Multiavatar($avatarId, true, null);
echo($multiavatar->svgCode);

$avatarId = "Starcrasher";
$multiavatar = new Multiavatar($avatarId, null, array("part" => "11", "theme" => "C"));
echo($multiavatar->svgCode);


echo("<br><br><br><br><br><br>");


//
// New version (with __invoke)
//
$multiavatar = new Multiavatar();

// Basic test
echo($multiavatar("Starcrasher", null, null));

// Without the environment part
$avatarId = "Pandalion";
echo($multiavatar($avatarId, true, null));

// Generate a specific version
echo($multiavatar($avatarId, null, array("part" => "11", "theme" => "C")));

// Generate a specific version
echo($multiavatar($avatarId, null, array("part" => "08", "theme" => "C")));

// Test transparency
echo($multiavatar($avatarId, null, array("part" => "15", "theme" => "B")));

// Test with integer
$avatarId = 123456789;
echo($multiavatar($avatarId, null, null));

// $avatarId = "a86f755add37fe0b649c";
// echo($multiavatar($avatarId, null, null));

// $avatarId = "f7542474d54d2d2d97e4";
// echo($multiavatar($avatarId, null, null));