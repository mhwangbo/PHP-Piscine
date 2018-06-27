#!/usr/bin/env php
<?php
if (count($argv) == 4)
{
	$no_1 = intval($argv[1]);
	$op = trim(preg_replace('/\s+/', '', $argv[2]));
	$no_2 = intval($argv[3]);
	if ($op == '+')
		$res = $no_1 + $no_2;
	elseif ($op == '-')
		$res = $no_1 - $no_2;
	elseif ($op == '*')
		$res = $no_1 * $no_2;
	elseif ($op == '/')
		$res = $no_1 / $no_2;
	elseif ($op == '%')
		$res = $no_1 % $no_2;
	echo "$res\n";
}
else
	echo "Incorrect Parameters\n";
?>
