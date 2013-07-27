<?php

function alert($message, $level = "info") {
    $_SESSION["alert"] = $message;
    
    $alertlevels = array("error", "success", "info");
    if (in_array($level, $alertlevels)) {
        $_SESSION["alert_level"] = $level;
    } else {
        $_SESSION["alert_level"] = "info";
    }
}

function alert_shown() {
    $_SESSION["alert"] = "";
    $_SESSION["alert_level"] = "info";
}
?>
