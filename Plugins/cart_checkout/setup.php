<?php
mkdir("../../../../src/com_checkout");
mkdir("../../../../com_config");
mkdir("../../../../src/com_checkout/admin");
header("Location: /administrator/plugin_manager/use_plugin.php?plugin=" . $_GET['plugin'] . "&setup=1");
exit();
?>