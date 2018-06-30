<?php
if ($_POST["submit"] !== "OK" || !$_POST["login"] || !$_POST["passwd"])
{
	echo "ERROR\n";
	exit ();
}
if (!file_exists('../htdocs'))
	mkdir ("../htdocs");
if (!file_exists('../htdocs/private'))
	mkdir ("../htdocs/private");
if (!file_exists('../htdocs/private/passwd'))
	file_put_contents('../htdocs/private/passwd', NULL);
$file = file_get_contents("../htdocs/private/passwd");
$file = unserialize($file);
if ($file)
{
	foreach($file as $key => $value)
	{
		if ($value["login"] == $_POST["login"])
		{
			echo "ERROR\n";
			exit ();
		}
	}
}
$info["login"] = $_POST["login"];
$info["passwd"] = hash('sha256', $_POST["passwd"]);
$file[] = $info;
file_put_contents("../htdocs/private/passwd", serialize($file));
echo "OK\n";
?>
