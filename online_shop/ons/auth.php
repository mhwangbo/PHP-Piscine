<?php
function auth($login, $passwd)
{
$file = file_get_contents("../private/passwd");
if (!$file)
{
	echo "ERROR\n";
	exit ();
}
$file = unserialize($file);
$count = 0;
foreach($file as $key => $value)
{
	if ($value["login"] == $login)
		if ($value["passwd"] == hash('sha256', $passwd))
			return TRUE;
}
return (FALSE);
}
?>
