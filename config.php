<?php
//Login or no login - that is the question
define("LOGIN_REQUIRED",     false);

//System configuration
define("SYSTEM_MODE",                   "development"); /* 'development' or 'production'*/
define("SYSTEM_USE_DEV_CONSOLE",        true);

// Path settings
define("SYSTEM_PATH",                   "system/");
define("APP_PATH",                      "app/");
define("VENDOR_PATH",                   "vendor/");
define("VENDOR_PATH_EXTERNAL",          "lib/"); //coordinate with .htaccess

/*Database configuration*/
define("REQUIRE_DATABASE",   false); //Setting this to false may cause some functions to misbehave
define("DB_HOST",           "localhost");
define("DB_USERNAME",       "username");
define("DB_PASSWORD",       "password");
define("DB_NAME",           "dbname");

/*Default app configuration options*/
define("DEFAULT_TITLE",                 "PinePHP");
define("DEFAULT_LANG_CODE",             "de");
define("DEFAULT_PAGE",                  "index");
define("DEFAULT_PAGE_NOT_LOGGEDIN",     "index");
define("DEFAULT_FILE_EXT",              "*"); //changing this may break links, "*" to accept all (php, html, htm)

/*Vendor libraries provided by PinePHP*/
define("USE_VENDORJS_JQUERY_LATEST",    false);
define("USE_VENDORJS_JQUERY_2_0_3",     true);

define("USE_VENDORCSS_FULL_RESET",      false); //use with care
define("USE_VENDORCSS_NORMALIZE",       true);

define("USE_VENDORCSS_ANIMATE_CSS",     false);
define("USE_VENDORCSS_FITGRID",         true);

define("USE_VENDORLIB_BOOTSTRAP_REGULAR",       false);
define("USE_VENDORLIB_BOOTSTRAP_RESPONSIVE",    false);

/*Localisation configuration - Maxmind API will be natively supported*/
define("PLUGIN_LOCALIZATION",       false);


//Runtime configuration
$_SESSION["admin_loggedin"] = true;
$_SESSION["developer_loggedin"] = true;
$_SESSION["companyid"] = "100001";
$_SESSION["currency"] = "euro";
$_SESSION["currency_symbol"] = "€";
$_SESSION["languagecode"] = DEFAULT_LANG_CODE;

?>
