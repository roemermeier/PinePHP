<?php

class HTMLpage {
    function DisplayHead($title = DEFAULT_TITLE) {
        ?>
        <!DOCTYPE html>
    <html lang="<? echo $_SESSION["languagecode"]; ?>">
      <head>
        <meta charset="utf-8">
        <title><? echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?
        if (USE_VENDORJS_JQUERY_LATEST === true) {
            ?><script src="http://code.jquery.com/jquery.js"></script><?
        }
        if (USE_VENDORJS_JQUERY_2_0_3 === true) {
            ?><script src="<? echo VENDOR_PATH_EXTERNAL; ?>js/jquery-2-0-3.js"></script><?
        }
        if (USE_VENDORLIB_BOOTSTRAP_REGULAR === true || USE_VENDORLIB_BOOTSTRAP_RESPONSIVE === true) {
            ?><script src="<? echo VENDOR_PATH_EXTERNAL; ?>js/bootstrap.min.js"></script><?
        }
        if (USE_VENDORCSS_FULL_RESET === true) {
            ?><link href="<? echo VENDOR_PATH_EXTERNAL; ?>css/reset.css" rel="stylesheet"><?
        }
        if (USE_VENDORCSS_NORMALIZE === true) {
            ?><link href="<? echo VENDOR_PATH_EXTERNAL; ?>css/normalize.css" rel="stylesheet"><?
        }
        if (USE_VENDORCSS_ANIMATE_CSS === true) {
            ?><link href="<? echo VENDOR_PATH_EXTERNAL; ?>css/animate.min.css" rel="stylesheet"><?
        }
        if (USE_VENDORCSS_FITGRID === true) {
            ?><link href="<? echo VENDOR_PATH_EXTERNAL; ?>css/fitgrid.css" rel="stylesheet"><?
        }
         if (USE_VENDORLIB_BOOTSTRAP_REGULAR === true) {
            ?><link href="<? echo VENDOR_PATH_EXTERNAL; ?>css/boostrap.min.css" rel="stylesheet"><?
        }
         if (USE_VENDORLIB_BOOTSTRAP_RESPONSIVE === true) {
            ?><link href="<? echo VENDOR_PATH_EXTERNAL; ?>css/bootstrap-responsive.min.css" rel="stylesheet"><?
        }
        if (SYSTEM_USE_DEV_CONSOLE === true && $_SESSION["developer_loggedin"] === true) {
            ?><link href="<? echo SYSTEM_PATH; ?>developertool/devtool.css" rel="stylesheet">
              <script src="<? echo SYSTEM_PATH; ?>developertool/devtool.js"></script>  
                <?
        }

    }
    
    function DisplayBody() {
        ?>
          </head>

      <body>
            <?
                if (SYSTEM_USE_DEV_CONSOLE === true && $_SESSION["developer_loggedin"] === true) {
                    include_once(SYSTEM_PATH . "developertool/devtool.php");
                }
            ?>
            <span id="alertcontainer">
              <? if (strlen($_SESSION["alert"]) > 2) {
                  ?>
            <div class="row-fluid" id="fluidcontainer">
                <div class="alert alert-<? echo $_SESSION["alert_level"]; ?>">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <h4>Warning!</h4>
                  <? echo $_SESSION["alert"]; ?>
                </div>
            </div>
                <?
              }

              alerts_shown();
              ?>
            </span>
         <?
    }

    function DisplayFoot() {
        ?>

        </body>
      </html>
        <?
    }
    
    function DisplaySnippet($filename) {
        include(APP_PATH . "snippets/" . $filename);
    }
}




?>
