#!/usr/bin/env php
<?php
function ft_split($str)
{
	$array = array_filter(explode(" ", $str));
	sort($array);
	return ($array);
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
	sort($array_1);
	for ($i = 0; $i < count($array_1); $i++)
		echo ($array_1[$i]."\n");
}
?>
