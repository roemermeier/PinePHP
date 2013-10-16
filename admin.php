<?

require_once("config.php");
require_once(SYSTEM_PATH . "core/general.php");

if ($_SESSION["admin_loggedin"] == true || $_SESSION["developer_loggedin"] == true ) {
    if (isset($_GET["v"])) {
        $views = array("dashboard", "pages", "editpage", "snippets", "editsnippet");
        if (in_array($_GET["v"], $views)) {
            require_once(SYSTEM_PATH . "admin/pages/" . $_GET["v"] . ".php");
        } else {
            http_response_code(404);
        }
    } else {
        require_once(SYSTEM_PATH . "admin/pages/dashboard.php");
    }
} else {
    http_response_code(403);
}