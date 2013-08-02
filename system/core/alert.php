<?php

function alert($message, $title = "System Message", $level = "info") {
   
    $alertlevels = array("error", "success", "info", "warning");
    if (in_array($level, $alertlevels)) {
        $validlevel = $level;
    } else {
        $validlevel = "info";
    }
    
    $alert = array("level" => $level, "message" => $message, "title" => $title);
    $_SESSION["alerts"][] = $alert;
}

function alerts_shown() {
    //unset($_SESSION["alerts"]);
    $_SESSION["alerts"] = array();
}
?>
