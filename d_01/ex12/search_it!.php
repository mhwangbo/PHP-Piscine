#!/usr/bin/env php
<?php
if (count($argv) > 2)
{
	$arr_key = [];
	$arr_value = [];
	$find = $argv[1];
	for($i = 2; $i < count($argv); $i++)
	{
		$tmp = explode(":", $argv[$i]);
		$arr_key[$i] = $tmp[0];
		$arr_value[$i] = $tmp[1];
	}
	$arr = array_combine($arr_key, $arr_value);
	if (array_key_exists($find, $arr))
		echo "$arr[$find]\n";
}
?>
