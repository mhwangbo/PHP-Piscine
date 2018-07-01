<?php
require_once('conn.php');

session_start();

$name = $_SESSION["logged_on_user"];
$sql = "DELETE FROM session WHERE name='{$name}'";
$resource = mysqli_query($conn, $sql);
setcookie(session_name(), '', time()-999999);
session_destroy();
if (!$resource)
	echo "<script>alert('logout fail');</script>";
?>
<meta http-equiv='refresh' content="0;url=index.php">
