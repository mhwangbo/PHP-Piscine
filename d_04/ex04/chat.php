<?php
session_start();
if (!$_SESSION["loggued_on_user"])
	echo "ERROR\n";
else
{
	if (file_exists("../private"))
	{
		$file = file_get_contents("../private/chat");
		$file = unserialize($file);
		foreach ($file as $value)
		{
			echo "[".date('H:i', $value['time'])."] <b>".$value['login']."</b>: ".$value['msg']."<br />\n";
		}
	}
}
?>
