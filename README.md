#PinePHP

PinePHP is a basic framework for developing PHP applications. Its goal is to provide the benefits of a PHP Framework while keeping restrictions at a bare minimum.

## Features:

- all features optional 
- no database required
- common external libraries included (jQuery, Bootstrap, Normalize.js, ...)
- alerts
- MySQL support
- HTML snippets
- developer tool that shows server variables ($_SESSION, $_SERVER, ...)
- integrated logging functionality (PHP, MySQL)
- ...

## Requirements

- PHP 5.x+
- Web server (Apache, nginx, ...) with mod_rewrite

## Installation

Unzip the above files to your web server. PinePHP is up and running immediately.

Your application files need to be placed inside the /app folder. For basic configuration options, please see config.php. Do not change any files in the /system folder. If you do, future updates may no longer work with your application.

### Usage

#### Hello World!

The page creation capabilities of PinePHP are delivered through the Page class. 

```php

<?php 
$Pine->Page->DisplayHead("PinePHP Testpage");

$Pine->Page->DisplayBody();
?>
  
<b>Hello World!</b>
	
<? $Pine->Page->DisplayFoot(); ?>
```

#### Using Snippets

```php
<? $Pine->Page->DisplaySnippet("menu.php"); ?>
```

All Snippets need to be placed in the app/snippets folder.

### Using the Developer Tool

In order to be able to user the developer tool, you need to be using $Pine->Page for displaying all your pages. In config.php you also need to have SYSTEM_USE_DEV_CONSOLE enabled.

The developer tool gives you access to all of PHP's superglobal variables. In addition to that, there is a module that allows you to create a log. If enabled, MySQL queries will be logged automatically. 

To create a PHP log entry from one of your scripts:

```php
<? $Pine->Log->Add("Hello World!", "error"); ?>
```

The arguments are "message" and "error level". The error level distinguishes between "info" (default), "success" and "error".

## License

PinePHP is licensed under the MIT license. See LICENSE.txt.
