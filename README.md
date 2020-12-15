# Multiavatar #

<img src="https://raw.githubusercontent.com/multiavatar/Multiavatar/main/logo.png?v=001" width="65">

[Multiavatar](https://multiavatar.com) is a multicultural avatar generator.

In total, it is possible to generate **12,230,590,464** unique avatars.

Initially coded in JavaScript, this version of Multiavatar is re-created in PHP. It can be used in PHP-based backend environments.

For more details about the Multiavatar Generator, please refer to the readme available in the JS [repository](https://github.com/multiavatar/Multiavatar).


### Installation ###

If you don't use composer, just include `Multiavatar.php` in your application.

```
require_once('Multiavatar.php');
```

Via Composer:

```bash
composer require multiavatar/multiavatar-php
```


### Usage ###

```
$string = "Binx Bond";
$multiavatar = new Multiavatar($string, null, null);
echo($multiavatar->svgCode);
```

For advanced usage, pass boolean `true` as the second parameter if you wish to generate an avatar without the environment part.

Pass an associative array as the third parameter to generate a specific avatar version.

```
$avatarId = "ANY_STRING";
$multiavatar = new Multiavatar($avatarId, true, array("part" => 11, "theme" => "C"));
echo($multiavatar->svgCode);
```

See `index.php` for examples.


### API ###

This PHP script is powering the [Multiavatar API](https://api.multiavatar.com). Simply pass the avatar's ID as the URL parameter, and the API will return the avatar's SVG code.

```
https://api.multiavatar.com/v1/Starcrasher
```

Below is a JavaScript API call example:

```
let avatarId = 'Binx Bond'
fetch('https://api.multiavatar.com/v1/'
+JSON.stringify(avatarId))
  .then(res => res.text())
  .then(svg => console.log(svg))
```


### License ###

You can use Multiavatar for free, as long as the conditions described in the [LICENSE](https://multiavatar.com/license) are followed.


### Screenshots ###

<img src="https://multiavatar.com/press/img/screenshots/screenshot-02.png?v=001">

<img src="https://multiavatar.com/press/img/screenshots/screenshot-03.png?v=001">

<img src="https://multiavatar.com/press/img/screenshots/screenshot-09.png?v=001">

<img src="https://multiavatar.com/press/img/screenshots/screenshot-10.png?v=001">


### More info ###

For additional information and extended functionality, visit the [multiavatar.com](https://multiavatar.com) web-app.

The app is based on static html for the home page, and on Laravel 8 + Vue.js for extended functionality, including the web store.

The product mockup generator for the [Merch Maker](https://multiavatar.com/merch-maker) is based on the ImageMagick PHP library.