#PinePHP

PinePHP is a basic framework for developing PHP applications. Its goal is to provide the benefits of a PHP Framework while keeping restrictions at a bare minimum.

## Features:

- all features optional 
- no database required
- common external libraries included (jQuery, Bootstrap, Normalize.js, ...)
- alerts
- MySQL support
- HTML snippets
- ...

## Requirements

- PHP 5.x+
- Web server (Apache, nginx, ...) with mod_rewrite

## Installation

Unzip the above files to your web server. PinePHP is up and running immediately.

Your application files need to be placed inside the /app folder. For basic configuration options, please see config.php. Do not change any files in the /system folder. If you do, future updates may no longer work with your application.

### Usage

#### Hello World!

```php

<?php
$Page = $GLOBALS["Page"]; 
$Page->DisplayHead();

$Page->DisplayBody();
?>
  
<b>Hello World!</b>
	
<? $Page->DisplayFoot(); ?>
´´´

#### Using Snippets

```php
<? $Page->DisplaySnippet("menu.php");
´´´

All Snippets need to be placed in the app/snippets folder.

## License

PinePHP is licensed under the MIT license. Please see LICENSE.txt.
