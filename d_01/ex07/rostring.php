#!/usr/bin/env php
<?php
$count = count($argv);
if ($count > 1)
{
	$str = 	$str = trim(preg_replace('/\s+/', ' ', $argv[1]));
	$array = array_filter(explode(" ", $str));
	$tmp = array_shift($array);
	for ($i = 0; $i < count($array); $i++)
		echo "$array[$i] ";
	echo "$tmp\n";
}
?>
