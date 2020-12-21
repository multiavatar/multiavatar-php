# Multiavatar #

<img src="https://raw.githubusercontent.com/multiavatar/Multiavatar/main/logo.png?v=001" width="65">

[Multiavatar](https://multiavatar.com) is a multicultural avatar generator.

In total, it is possible to generate **12,230,590,464** unique avatars.

Initially coded in JavaScript, this version of Multiavatar is re-created in PHP. It can be used in PHP-based backend environments.

For more details about the Multiavatar Generator, please refer to the readme available in the JS [repository](https://github.com/multiavatar/Multiavatar).

### Installation ###

If you don't use composer, just include the autoloader in the root of the directory in your application.

```
require_once '/path/to/directory/Multiavatar/autoload.php';
```

Via Composer:

```bash
composer require multiavatar/multiavatar-php
```

### Usage ###

```php
<?php

use Multiavatar\Multiavatar;

$multiavatar = new Multiavatar();
$avatarId = "Binx Bond";
echo $multiavatar($avatarId);
```

For advanced usage, you can pass an array as a second and last parameter as shown below:

```php
<?php

use Multiavatar\Multiavatar;

$multiavatar = new Multiavatar();
$avatarId = "ANY_STRING_OR_INT";
$options = [
    'ver' => [
        'part' => '11', 
        'theme' => 'C',
    ], 
    'sansEnv' => true,
];

echo $multiavatar($avatarId, $options);
```
The option array contains the following indexes:

- `sansEnv`: Tells whether the environment should be display or not. By default, the environment is display.  
  To remove the environment you should set the value to `true.
  
- `version`: Indicate which theme and shape should be used to generate the avatar.  
  There is 3 themes that you specify with the `theme` index named from `A` to `C`
  and 16 shapes specified with the `part` index whose named ranged from `00` to `15`.
  
Each of those values can be set independently of each other.

```php
<?php

use Multiavatar\Multiavatar;

$multiavatar = new Multiavatar();

// Default usage
// The shape will be selected from the $avatarId
// The theme will be selected from the avatarId
// The environment is shown
$avatarId = "Starcrasher";
echo $multiavatar($avatarId);

// The shape will be selected from the $avatarId
// The theme will be selected from the avatarId
// Without the environment part
$avatarId = "Pandalion";
echo $multiavatar($avatarId, ['sansEnv' => true]);

// Generate a specific version
// version shape can be express in integer or in string containing only numbers. 
$avatarId = "Pandalion";
echo $multiavatar($avatarId, ['sansEnv' => false, 'ver' => ['part' => 11, 'theme' => 'C']]);

// The avatarId can be a string or an integer
// version theme are case insensitive. 
// The shape will be selected from the $avatarId
$avatarId = 123456789;
echo $multiavatar($avatarId, ['sansEnv' => false, 'ver' => ['theme' => 'b']]);

// Test with a specific shape
// The theme will be selected from the avatarId
$avatarId = "a86f755add37fe0b649c";
echo $multiavatar($avatarId, ['ver' => ['part' => '08']]);

$avatarId = "f7542474d54d2d2d97e4";
echo $multiavatar($avatarId);
```

### Testing ###

The library has a :

- a [PHPUnit](https://phpunit.de) test suite
- a code analysis compliance test suite using [PHPStan](https://phpstan.org).

To run the tests, run the following command from the project folder.

``` bash
$ composer test
```

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
