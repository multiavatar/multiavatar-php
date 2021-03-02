# Multiavatar #

<img src="https://raw.githubusercontent.com/multiavatar/Multiavatar/main/logo.png?v=001" width="65">

[Multiavatar](https://multiavatar.com) is a multicultural avatar generator.

In total, it is possible to generate **12,230,590,464** cryptographically unique avatars.

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
$multiavatar = new Multiavatar();
$svgCode = $multiavatar("Binx Bond", null, null);
```

For advanced usage, pass boolean `true` as the second parameter if you wish to generate an avatar without the environment part.

Pass an associative array as the third parameter to generate a specific avatar version.

```
$multiavatar = new Multiavatar();
$avatarId = "ANY_STRING";
$svgCode = $multiavatar($avatarId, true, array("part" => "11", "theme" => "C"));
```


### API ###

This PHP script is powering the [Multiavatar API](https://api.multiavatar.com).

To get an avatar as SVG code, add the avatar's ID to the URL:

```
https://api.multiavatar.com/Binx Bond
```
JavaScript API call example to get SVG code:

```
let avatarId = 'Binx Bond'
fetch('https://api.multiavatar.com/'
+JSON.stringify(avatarId))
  .then(res => res.text())
  .then(svg => console.log(svg))
```
To get an avatar as SVG file, add .svg to the end of the URL:

```
https://api.multiavatar.com/Binx Bond.svg
```
To get an avatar as PNG file, add .png to the end of the URL:

```
https://api.multiavatar.com/Binx Bond.png
```


### Testing ###

To catch bugs, the representation of tests should be visual because not all bugs have programmatic errors. For example, if an equal length color array is mixed, or a double semicolon appears in a color string, in such cases an error is not thrown, but the visual representation of avatar(-s) becomes broken.

There are two types of tests, currently available in `index.php` and `other.php` files. Simply load these files in your browser from your PHP web server.

In the `index.php` file, visually presented are all 48 base versions or avatars. If all 48 base versions are good, then it means that all 12 billion are also good, because the 12 billion are constructed from different parts of the 48 base versions. All avatars in this file should look exactly the same as in the JavaScript repository's `\svg\index.html` file.

In the `other.php` file, additional various tests are performed to test different approaches how to generate avatars, specific avatar versions, or some repository-specific cases.


### Contributors ###

Ignace Nyamagana Butera ([@nyamsprod](https://github.com/nyamsprod))


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