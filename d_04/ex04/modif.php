<?php
header('Location: index.html');
if ($_POST["submit"] !== "OK" || !$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"])
{
	echo "ERROR\n";
	exit ();
}
$file = file_get_contents("../private/passwd");
if (!$file)
	exit ();
$file = unserialize($file);
$count = 0;
for ($i=0; $i < count($file); $i++)
{
	if ($file[$i]["login"] == $_POST["login"])
	{
		if ($file[$i]["passwd"] == hash('sha256', $_POST["oldpw"]))
		{
			$count = 1;
			$file[$i]["passwd"] = hash('sha256', $_POST["newpw"]);
		}
	}
}
if ($count == 1)
{
	file_put_contents("../private/passwd", serialize($file));
	echo "OK\n";
	exit();
}
else
	echo "ERROR\n";
?>
