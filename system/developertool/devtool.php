<div id="dev_trigger">
    <a href="#" onclick="javascript:devtool_show()">>></a>
</div>
<div class="dev_window" id="pinephp_dev_window">
    <div id="dev_clear"></div>
    <div id="dev_menu">
    <ul>
      <li class="dev_menuitem">
        <a href="javascript:devtool_activateTab('dev_overview')">Overview</a>
      </li>
      <li class="dev_menuitem">
        <a href="javascript:devtool_activateTab('dev_session')">$_SESSION</a>
      </li>
       <li class="dev_menuitem">
        <a href="javascript:devtool_activateTab('dev_get')">$_GET</a>
      </li>
       <li class="dev_menuitem">
        <a href="javascript:devtool_activateTab('dev_post')">$_POST</a>
      </li>
      <li class="dev_menuitem">
        <a href="javascript:devtool_activateTab('dev_server')">$_SERVER</a>
      </li>
      <li class="dev_menuitem">
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
    </div>
</div>