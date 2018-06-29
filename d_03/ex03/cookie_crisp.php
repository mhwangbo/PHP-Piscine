<?php
if ($_GET['action'] == "set")
	setcookie($_GET['name'], $_GET['value'], time() + 3600);
elseif ($_GET['action'] == "get")
	echo $_COOKIE[$_GET['name']];
elseif ($_GET['action'] == "del")
	setcookie($_GET['name'], "", time() - 3600);
?>
