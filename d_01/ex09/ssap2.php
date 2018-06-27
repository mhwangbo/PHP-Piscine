#!/usr/bin/env php
<?php
function ft_split($str)
{
	$array = array_filter(explode(" ", $str));
	sort($array);
	return ($array);
}

function ft_sort_support($a, $j)
{
	$b = array();
	for($i = 0; $i < count($a); $i++)
	{
		if (ord($a[$i][$j]) >= 97 && ord($a[$i][$j]) <= 122)
			$b[$i] = ord($a[$i][$j]) - 96;
		elseif (ord($a[$i][$j]) >= 65 && ord($a[$i][$j]) <= 90)
			$b[$i] = ord($a[$i][$j]) - 64;
		elseif (ord($a[$i][$j]) >= 48 && ord($a[$i][$j]) <= 57)
			$b[$i] = ord($a[$i][$j]);
		else
			$b[$i] = ord($a[$i][$j]) + 100;
	}
	return($b);
}

function ft_sort($a)
{
	$b = ft_sort_support($a, 0);
	$result = array_combine($a, $b);
	asort($result);
	return ($result);
}

$len = count($argv);
if ($len > 1)
{
	$i = 2;
	$array_1 = ft_split(trim(preg_replace('/\s+/', ' ', $argv[1])));
	while ($i < (count($argv)))
	{
		$array_2 = ft_split(trim(preg_replace('/\s+/', ' ', $argv[$i])));
		$j = 0;
		while ($j < count($array_2))
		{
			array_push($array_1, $array_2[$j]);
			$j++;
		}
		$i++;
	}
	$result = ft_sort($array_1);
	foreach($result as $key => $value)
		echo "$key\n";
}
?>
