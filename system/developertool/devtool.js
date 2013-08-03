function devtool_activateTab(pageId) {
    var tabCtrl = document.getElementById('devtool_tabCtrl');
    var pageToActivate = document.getElementById(pageId);
    for (var i = 0; i < tabCtrl.childNodes.length; i++) {
        var node = tabCtrl.childNodes[i];
        if (node.nodeType == 1) { /* Element */
            node.style.display = (node == pageToActivate) ? 'block' : 'none';
        }
    }
}

function devtool_show() {
    document.getElementById('pinephp_dev_window').style.display = 'block';
    document.getElementById('dev_trigger').style.display = 'none';
}

function devtool_hide() {
    document.getElementById('pinephp_dev_window').style.display = 'none';
    document.getElementById('dev_trigger').style.display = 'block';    
}

