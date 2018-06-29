#!/usr/bin/env php
<?php
if ($argc != 2 || !file_exists($argv[1]))
	exit ();
$f = fopen($argv[1], 'r');
while ($f && !feof($f))
{
	$str = trim(fgets($f));
	if ($str)
		$arr[] = $str;
}
$counter = 0;
$list = array();
for($i = 0; $i < count($arr); $i++)
{
	if ($counter == 0)
		$counter++;
	else if ($counter == 1)
	{
		$counter++;
		$time = $arr[$i];
	}
	else if ($counter == 2)
	{
		$list[$time] = $arr[$i];
		$counter = 0;
	}
}
ksort($list);
$i = 1;
foreach($list as $key => $value)
{
	echo $i."\n";
	echo $key."\n";
	echo $value."\n";
	if ($i < count($list))
		echo "\n";
	$i++;
}
?>
