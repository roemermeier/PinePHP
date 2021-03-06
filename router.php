<?
session_start();

date_default_timezone_set('Europe/Berlin');

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

try //Global Try-Catch
{
    include_once("config.php");

if (SYSTEM_MODE == "development") {
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
} else {
    error_reporting(-1);
}

require_once(SYSTEM_PATH . "core/class.log.php");
require_once(SYSTEM_PATH . "core/class.validator.php");
require_once(SYSTEM_PATH . "core/class.pine.php");

include_once(SYSTEM_PATH . "core/class.database.php");
include_once(SYSTEM_PATH . "core/format.php");
include_once(SYSTEM_PATH . "core/alert.php");
include_once(SYSTEM_PATH . "core/controls.php");
include_once(SYSTEM_PATH . "core/module.geo.php");
include_once(SYSTEM_PATH . "core/general.php");
include_once(SYSTEM_PATH . "core/htmlbase.php");

$phplog = array();  global $phplog;
$sqllog = array();  global $sqllog;

$Pine = new Pine();
global $Pine;

//Login handling only
if (LOGIN_REQUIRED === false) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = "Guest";
} else {
    if ($_GET["c"] == "Login") {
        
        if (REQUIRE_DATABASE === true) {
            $db = new database();
            $db->connect();
        }
        
        if ($_SESSION["loggedin"] === true) {
            alert("You are already logged in.", "error");
        } else {
            include_once(SYSTEM_PATH . "actions/LoginController.php");
        }
    }
}


//Regular application code
if ($_SESSION["loggedin"] === true) {
     
     if (REQUIRE_DATABASE === true) {
        $db = new database();
        $db->connect();
    }
    
    if (isset($_GET["c"])) {
        $controller = array("Logout", "Delete");
        if (in_array($_GET["a"], $controller)) {
            
            include_once(SYSTEM_PATH . "actions/" . $_GET["c"] . "Controller.php");
        } 
    }
    
    if (!isset($_GET["p"])) {
        include_once(APP_PATH . "/" . DEFAULT_PAGE . ".php");
        $displayed = true;
    } else {
        $pagename = $_GET["p"];
    }
    
    if ($displayed !== true) {
        include_page($pagename);
    }
    
     

//Not logged in.
} else {
    
    include_page(DEFAULT_PAGE_NOT_LOGGEDIN);
}

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
//echo 'Page generated in '.$total_time.' seconds.';
}
catch (Exception $e)
{
 echo $e->message;
}
?>