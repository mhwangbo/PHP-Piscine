#!/usr/bin/env php
<?php
if ($argc != 3 || !file_exists($argv[1]))
	exit();
$f = fopen($argv[1], 'r');
while ($f && !feof($f))
	$list[] = explode(";", fgets($f));
$index = $list[0];
for($i = 0; $i < count($index); $i++)
{
	if($index[$i] == "nom")
		$index[$i] = "last_name";
	else if ($index[$i] == "prenom")
		$index[$i] = "name";
}
unset($list[0]);
$list = array_map('array_filter', $list);
$list = array_filter($list);
foreach($index as $key => $value)
	$index[$key] = trim($value);
$number = array_search($argv[2], $index);
if ($number === FALSE)
	exit();
foreach ($index as $index_key=>$index_value)
{
	$tmp = array();
	foreach ($list as $value)
	{
		if (isset($value[$number]))
			$tmp[trim($value[$number])] = trim($value[$index_key]);
	}
	$$index_value = $tmp;
}
$stdin = fopen("php://stdin", "r");
while (1) 
{
	echo "Enter your command: ";
	$order = fgets($stdin);
	if (feof($stdin) == TRUE)
		break ;
	if ($order) {

		$result = eval($order);
	}
}
fclose($stdin);
echo "\n";
?>
