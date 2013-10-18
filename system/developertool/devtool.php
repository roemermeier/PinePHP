<div id="dev_trigger">
    <a href="#" onclick="javascript:devtool_show()">>></a>
</div>
<div class="dev_window" id="pinephp_dev_window">
    <div id="dev_clear"></div>
    <div id="dev_menu">
    <ul>
      <li>
        <a href="javascript:devtool_activateTab('dev_overview')">Overview</a>
      </li>
      <li>
        <a href="javascript:devtool_activateTab('dev_superglobals')">Superglobals</a>
        <ul>
            <li><a href="javascript:devtool_activateTab('dev_session')">$_SESSION</a></li>
            <li><a href="javascript:devtool_activateTab('dev_get')">$_GET</a></li>
            <li><a href="javascript:devtool_activateTab('dev_post')">$_POST</a></li>
            <li><a href="javascript:devtool_activateTab('dev_cookie')">$_COOKIE</a></li>
            <li><a href="javascript:devtool_activateTab('dev_server')">$_SERVER</a></li>
            <li><a href="javascript:devtool_activateTab('dev_env')">$_ENV</a></li>
        </ul>
      </li>
      <li>
        <a href="javascript:devtool_activateTab('dev_phplog')">Logs</a>
        <ul>
            <li>
                <li><a href="javascript:devtool_activateTab('dev_phplog')">PHP</a></li>
            </li>
            <li>
                <li><a href="javascript:devtool_activateTab('dev_sqllog')">SQL</a></li>
            </li>
        </ul>
      </li>
      <li>
        <a href="system/developertool/phpinfo.php" target="_blank">phpinfo()</a>
      </li>
      <li id="dev_pageurl">
          <? echo currentFilePath(); ?>
      </li>
       <li style="float: right;">
        <a href="#" onclick="javascript:devtool_hide();">Close</a>
      </li>
    </ul>
    </div>
    <div id="devtool_tabCtrl">
      <div class="dev_tab" id="dev_overview" style="display: block;">
          <h1>PinePHP Developer Tool</h1>
          Welcome to the PinePHP developer tool. This tool allows you to easily access server-side resources. It is meant to be used in conjunction with the various browser developer tools such as Opera Dragonfly.
          <br><br>Use it to access <a href="javascript:devtool_activateTab('dev_superglobals')">Superglobal's</a>
          and to derive information from the <a href="javascript:devtool_activateTab('dev_phplog')">Logs</a>.
          
      </div>
      <div class="dev_tab" id="dev_superglobals" style="display: none;">
          <h3>SUPERGLOBALS</h3>
          <p>Check out what's inside PHP's superglobal variables.</p>
          <p><a target='_blank' href='http://php.net/manual/en/language.variables.superglobals.php'>More on PHP.net</a></p>
      </div>
      <div class="dev_tab" id="dev_session" style="display: none;">
          <?  
            echo "<h3>\$_SESSION</h3><pre>";
            print_r($_SESSION);
            echo "</pre>";
          ?>
      </div>
      <div class="dev_tab" id="dev_get" style="display: none;">
          <?  
            echo "<h3>\$_GET</h3><pre>";
            print_r($_GET);
            echo "</pre>";
          ?>
      </div>
      <div class="dev_tab" id="dev_post" style="display: none;"> <?  
            echo "<h3>\$_POST</h3><pre>";
            print_r($_POST);
            echo "</pre>";
          ?>
      </div>
      <div class="dev_tab" id="dev_server" style="display: none;"> <?  
            echo "<h3>\$_SERVER</h3><pre>";
            print_r($_SERVER);
            echo "</pre>";
          ?>
      </div>
        <div class="dev_tab" id="dev_cookie" style="display: none;"> <?  
            echo "<h3>\$_COOKIE</h3><pre>";
            print_r($_COOKIE);
            echo "</pre>";
          ?>
      </div>
      <div class="dev_tab" id="dev_env" style="display: none;"> <?  
            echo "<h3>\$_ENV</h3><pre>";
            print_r($_ENV);
            echo "</pre>";
          ?>
      </div>
      <div class="dev_tab" id="dev_phplog" style="display: none;"> <?  
            echo "<h3>PHP Log</h3>";
            $items = $GLOBALS["phplog"];
            foreach ($items as $logentry) {
                echo "<div class='dev-alert dev-alert-" . $logentry["level"] . "'>" . $logentry["msg"] . "</div>";
            }
          ?>
      </div>
      <div class="dev_tab" id="dev_sqllog" style="display: none;"> <?  
            echo "<h3>SQL Log</h3>";
            $items = $GLOBALS["sqllog"];
            foreach ($items as $logentry) {
                echo "<div class='dev-alert dev-alert-" . $logentry["level"] . "'>" . $logentry["msg"] . "</div>";
            }
          ?>
      </div>
    </div>
</div>