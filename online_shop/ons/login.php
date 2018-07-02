<?php
require_once('conn.php');

session_start();

$name = $_POST['name'];
$pass = $_POST['pass'];

if ($name && $pass)
{
	$sql = "SELECT * FROM user WHERE name='{$name}' and pass='{$pass}'";
	$resource = mysqli_query($conn, $sql);
	$num = mysqli_fetch_assoc($resource);

	if ($num > 0)
	{
		$_SESSION["idx"] = $num["idx"];
		$_SESSION["logged_on_user"] = $name;

		echo "<script> alert('Login Sucess!');</script>";
	}
	else
		echo "<script> alert('Login or Password is incorrect');</script>";
}
?>
<meta http-equiv="refresh" content="0; url=index.php">
