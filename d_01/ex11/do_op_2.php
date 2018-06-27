#!/usr/bin/env php
<?php
function do_op($one, $op, $two)
{
	$no_1 = intval($one);
	$no_2 = intval($two);
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
	return ($res);
}
if (count($argv) == 2)
{
	$operator = 0;
	$str = trim(preg_replace('/\s+/', '', $argv[1]));
	for($i = 0; $i < strlen($str); $i++)
	{
		if (!ctype_digit($str[$i]))
		{
			if (!strpos("+-*/%", $str[$i]) || $operator == 1)
			{
				echo "Syntax Error\n";
				exit (0);
			}
			$op = $str[$i];
			$operator = 1;
		}
	}
	$no = array_filter(explode("$op", $str));
	$result = do_op($no[0], $op, $no[1]);
	echo "$result\n";
}
else
	echo "Incorrect Parameters\n";
?>
