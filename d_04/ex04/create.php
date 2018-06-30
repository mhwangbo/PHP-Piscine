<?php
header('Location: index.html');
if ($_POST["submit"] !== "OK" || !$_POST["login"] || !$_POST["passwd"])
{
	echo "ERROR\n";
	exit ();
}
if (!file_exists('../private'))
	mkdir ("../private");
if (!file_exists('../private/passwd'))
	file_put_contents('../private/passwd', NULL);
$file = file_get_contents("../private/passwd");
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
$fp = fopen("../private/passwd", "w");
file_put_contents("../private/passwd", serialize($file));
fclose($fp);
echo "OK\n";
exit;
?>
