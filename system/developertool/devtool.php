<div class="dev_trigger">
    <a href="#" onclick="document.getElementById('pinephp_dev_window').style.display = 'block';">>></a>
</div>
<div class="dev_window" id="pinephp_dev_window">
    <h1>PinePHP Developer Tool - <? echo currentFilePath(); ?></h1>
    <div class="dev_content">
        <?
            echo "<h3>SESSION</h3>";
            print_r($_SESSION);
            echo "<h3>POST</h3>";
            print_r($_POST);
            echo "<h3>GET</h3>";
            print_r($_GET);
        ?>
    </div>
</div>