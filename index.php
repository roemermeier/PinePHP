<?
session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

require_once("config.php");

$_SESSION["companyid"] = "100001";
$_SESSION["currency"] = "euro";
$_SESSION["currency_symbol"] = "€";

require_once("php/class.database.php");
require_once("php/format.php");
require_once("php/alert.php");
require_once("php/controls.php");
require_once("php/module.geo.php");
require_once("php/general.php");

//Login handling only
if (LOGIN_REQUIRED === false) {
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = "Guest";
    $_SESSION["companyid"] = "100001";
} else {
    if ($_GET["c"] == "Login") {

        $db = new database();
        $db->connect();
     
        if ($_SESSION["loggedin"] === true) {
            alert("You are already logged in.", "error");
        } else {
            require_once("controller/LoginController.php");
        }
    }
}


//Regular application code
if ($_SESSION["loggedin"] === true) {
     
     
     //alert("An error occurred.", "error");
     
     $db = new database();
     $db->connect();
    
    if (isset($_GET["c"])) {
        $controller = array("Logout", "Delete");
        if (in_array($_GET["c"], $controller)) {
            
            require_once("controller/" . $_GET["c"] . "Controller.php");
        } 
    }
    
    require_once("php/htmlbase.php");
    
    if (!isset($_GET["p"])) {
        require_once("pages/dash.php");
    } else {
        $pages = array("dash", "customers", "orders", "products", "docs", "edit", "mail", "editdoc");
        $json = array("json_customer", "json_order", "json_document", "json_product");
        $docs = array("doc_html");
        $ajax = array("ajax_save_edits", "ajax_get_stats", "ajax_show_orders");
        
        
        if (in_array($_GET["p"], $pages)) {
            require_once("pages/" . $_GET["p"] . ".php");
        } elseif (in_array($_GET["p"], $json)) {
             require_once("json/" . $_GET["p"] . ".php");
        } elseif (in_array($_GET["p"], $docs)) {
             require_once("docs/" . $_GET["p"] . ".php");
        } elseif (in_array($_GET["p"], $ajax)) {
             require_once("ajax/" . $_GET["p"] . ".php");
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }
    

//Not logged in.
} else {
    require_once("pages/login.php");
}

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
//echo 'Page generated in '.$total_time.' seconds.';

?>