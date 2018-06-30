<?php
session_start();
if (!$_SESSION["loggued_on_user"])
	echo "ERROR\n";
else
{
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/chat"))
		file_put_contents("../private/chat", null);
	if ($_POST["msg"])
	{
		$file = file_get_contents("../private/chat");
		$file = unserialize($file);
		$chat["login"] = $_SESSION["loggued_on_user"];
		$chat["time"] = time();
		$chat["msg"] = $_POST["msg"];
		$file[] = $chat;
		$fp = fopen("../private/chat", "w");
		flock($fp, LOCK_EX);
		file_put_contents("../private/chat", serialize($file));
		flock($fp, LOCK_UN);
		fclose($fp);
	}
?>
<html>
	<head>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form action="speak.php" method="POST">
			<input type="text" name="msg" value="" style="hegiht:50px;"/><input type="submit" name="submit" value="Send"/>
		</form>
	</body>
</html>
<?php
}
