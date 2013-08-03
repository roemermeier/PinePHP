<?php

function include_page($pagename) {
    $ext_valid = false;
    if (DEFAULT_FILE_EXT == "*") {
        $ext = array("php", "html", "htm");
        if (in_array($_GET["ext"], $ext)) {
            $ext_valid = true;
        }
    } elseif ($_GET["ext"] == DEFAULT_FILE_EXT) {
       $ext_valid = true; 
    }
    
    if ($ext_valid === true) {
        if (file_exists(APP_PATH . $pagename . ".php")) {
            include_once(APP_PATH . $pagename . ".php");
        } elseif (file_exists(APP_PATH . $pagename . ".html")) {
            include_once(APP_PATH . $pagename . ".html");
        } elseif (file_exists(APP_PATH . $pagename . ".htm")) {
            include_once(APP_PATH . $pagename . ".htm");
        } else {
            if (SYSTEM_MODE == "development") {
                echo APP_PATH . $pagename . ".php Not Found.";
            } else {
                http_response_code(404);
            }
        }
    } else {
        http_response_code(404);
    }
    
    
    
}

function objectToArray($d) {
		if (is_object($d)) {

			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {

			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
        
function currentFilePath() {
    $path = $_SERVER['PHP_SELF'] . "?";
    
    foreach ($_GET as $key => $value) {
        $path .= $key . "=" . $value . "&";
    }
    
    return substr($path, 0, -1);
}
?>
