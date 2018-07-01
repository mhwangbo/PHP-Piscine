<?

# $connect = mysql_connect('localhost:8100', 'root', 'password');
# mysql_select_db(DB_NAME $connect);
#
function create_user($sel)
{
	echo ('
		<html>
			<head>
				<meta charset="UTF-8">
				<link rel="stylesheet" type="text/css" href="user.css">
				<title>user sign up</title>
			</head>
			<body>
			<center>
				<font style="font-size:10px;color:#fffff0;">(* is required field.)</font>
				<form action="user.php" method="POST">
					Username: <input type="text" name="name"><br /></td>
					Password: <input type="text" name="passwd"><br /></td>
					<input type="submit" value="OK"><br />
					<input type="reset" value="Reset"<br />
				</form>
			</center>
			</body>
		</html>
	');
}

function error_user($login, $passwd, $submit)
{
	#$ally = mysql_query("select login from user where login='$login' ", $connect);
	#$user = mysql_fetch_array($ally);

	if (!$login)
	{
		echo("
		<script>
			window.alert('Please insert login')
			history.go(-1)
		</script>
		");
		exit ();
	}
	if ($user[login])
	{
		echo("
		<script>
			window.alert('Login already exits')
			history.go(-1)
		</script>
		");
		exit ();
	}
	if (!$passwd)
	{
		echo("
		<script>
			window.alert('Please insert password')
			history.go(-1)
		</script>
		");
		exit ();
	}
}

function	main_view($login, $connect)
{
	#mysql_select_db(DATABASE,$connect);

	#$ally = mysql_query("select no,title,mview,view from admin order by no ",$connet);
	#$ally2 = mysql_query("select no,title,mview,view from file order by no ",$connet);

	#$put = mysql_fetch_array($ally);
	#$put2 = mysql_fetch_array($ally2);

	#mysql_select_db(DATABASE, $connect);

	#$allya = mysql_query("select no,title,hit from $put[mview] order by hit desc", $connect);
	#$allyb = mysql_query("select no,title,hit from $put2[mview] order by hit desc", $connect);
	#$put3 = mysql_fetch_array($allya);
	#$put4 = mysql_fetch_array($allyb);
	
	#$t_num = mysql_num_rows($ally);
	#$t_num2 = mysql_num_rows($ally2);

	if (!$login) {
		$sslogin = "Please login";
		$userss = "<a href ='user.php>chanl=main'>";
	}

	if ($login)
	{
		$sslogin = "$login logged in";
		$userss = "<a href = 'userin.php?chanl=main'>";
	}

	echo ('
		<html>
			<head>
				<title>main_view</title>
			</head>
			<body>
				<center>
					$sslogin
					<br>
					<br>

					<table border = "0" cellspacing="2" cellpadding="2" width="500">
					<tr>
					$userss
					(sign up)
					</a>
					<form action="user.php" method="POST">
						<input type="hidden" name="chanl" value="login">
						<td width="90" align="center">
						<b>Login</b></td>
						<td><input type="text" name="login"></td>
						<td align = left>
						<a href='
