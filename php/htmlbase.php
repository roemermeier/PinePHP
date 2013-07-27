<?php

function DisplayHTMLHead() {
    ?>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PinePHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/scripts.js"></script>


    <link href="css/style.css" rel="stylesheet">

    <?
}

function DisplayHTMLBody() {
    ?>
      </head>

  <body>


          
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
          
          alert_shown();
          ?>
        </span>
     <?
}

function DisplayHTMLFoot() {
    ?>

    </body>
  </html>
    <?
}
?>
