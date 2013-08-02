<?
session_start();

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

include_once(SYSTEM_PATH . "core/class.database.php");
include_once(SYSTEM_PATH . "core/format.php");
include_once(SYSTEM_PATH . "core/alert.php");
include_once(SYSTEM_PATH . "core/controls.php");
include_once(SYSTEM_PATH . "core/module.geo.php");
include_once(SYSTEM_PATH . "core/general.php");
include_once(SYSTEM_PATH . "core/htmlbase.php");

$Page = new HTMLpage();

//Login handling only
if (LOGIN_REQUIRED === false) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = "Guest";
    $_SESSION["companyid"] = "100001";
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
        $pagename = DEFAULT_PAGE;
    } else {
        $pagename = $_GET["p"];
    }
    
    if (file_exists(APP_PATH . $pagename . ".php")) {
        include_once(APP_PATH . $pagename . ".php");
    } else {
        http_response_code(500);
    }
    

//Not logged in.
} else {
    include_once(APP_PATH . DEFAULT_PAGE_NOT_LOGGEDIN . ".php");
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