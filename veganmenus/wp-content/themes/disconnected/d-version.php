<?php

$currentVersion = "1.3";
header("Content-type: text/plain");

if($_GET['version'] == $currentVersion) {
// do nothing
} else {
echo "document.write('<div class=\"updated\"><p>A new version of the Disconnected theme, <a href=\"https://sourceforge.net/project/platformdownload.php?group_id=188321&sel_platform=201\" title=\"theme homepage\">version $currentVersion</a>, is now available.</p></div>');";
}

?>
