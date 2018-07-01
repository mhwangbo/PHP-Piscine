<?php
	include "header.php";

$name = $_POST["name"];
$pass = $_POST["pass"];

if ($name && $pass)
{
	$sql = "SELECT * FROM user WHERE name='{$name}'";
	$resource = mysqli_query($conn, $sql);
	$num = mysqli_fetch_assoc($resource);
	if ($num > 0)
	{
		echo "<script> alert('Username already in use.');</script>";
		echo "<script>window.history.back();</script>";
		exit(0);
	}
	$sql = "INSERT INTO user(name, pass) VALUE('{$name}', '{$pass}')";
	$ret = mysqli_query($conn, $sql);
	if ($ret)
	{
		echo "<script> alert('Registeration completed');</script>";
		echo '<meta http-equiv="refresh" content="0; url=index.php">';
		exit(0);
	}
	else
		echo "<script> alert('Fail to register');</script>";
}
else
{
?>
<!DOCTYPE html>
	<div class="middle_create block">
		<form action="create.php" method="POST">
			<h2>Register</h2>
			<input type="text" name="name" placeholder="Username" required autofocus><br /><br />
			<input type="text" name="pass" placeholder="Password" required><br /><br />
			<button type="submit">Sign Up</button>
		</form>
	</div>
	</body>
</html>
<?php
}
?>
