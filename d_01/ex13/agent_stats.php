#!/usr/bin/env php
<?php
function find_average($f, $index)
{
	$sum = 0;
	$count = 0;

	while ($line = rtrim(fgets($f), "\n"))
	{
		$res = explode(';', $line);
		if (isset($res[$index["Note"]])
			&& is_numeric($note = $res[$index["Note"]])
			&& (!isset($res[$index["Noteur"]])
			|| (isset($res[$index["Noteur"]]) 
			&& $res[$index["Noteur"]] != "moulinette")))
		{
			$sum += (int)$note;
			$count++;
		}
	}
	echo ($sum / $count);
	echo "\n";
}

function find_average_user($f, $index, $option)
{
	$arr = [];
	$mou = [];
	while ($line = rtrim(fgets($f), "\n"))
	{
		$res = explode(';', $line);
		if (is_numeric($res[$index["Note"]])
			&& $res[$index["Noteur"]] != "moulinette")
			$arr[] = $res;
		elseif (is_numeric($res[$index["Note"]])
			&& $res[$index["Noteur"]] == "moulinette")
			$mou[] = $res;
	}
	sort($arr);
	sort($mou);
	$i = 0;
	while ($i < count($arr))
	{
		$sum = 0;
		$count = 0;
		$name = $arr[$i][$index["User"]];
		while (($i < count($arr)) 
			&& ($arr[$i][$index["User"]] == $name) 
			&& (is_numeric($note = $arr[$i][$index["Note"]])))
		{
			$sum += (int)$note;
			$count++;
			$i++;
		}
		if ($count > 0 && $option == 1)
		{
			echo "$name:";
			echo ($sum / $count);
			echo "\n";
		}
		else if ($count > 0 && $option == 2)
		{
			if (in_array($name, array_column($mou, $index["User"])))
			{
				$key = array_search($name, array_column($mou, $index["User"]));
				echo "$name:";
				echo (($sum / $count) - $mou[$key][$index["Note"]]);
				echo "\n";
			}
		}
		else
			$i++;
	}
}

if (isset($argv) && isset($argv[1]))
{
	$option = array_search($argv[1], ["average", "average_user", 
		"moulinette_variance"]);
	if ($option >= 0)
	{
		$f = fopen('php://stdin', 'r');
		$arr = [];
		$i = 0;
		$index = array_flip(explode(";", fgets($f)));

		if ($option == 0)
			find_average($f, $index);
		elseif ($option == 1 || $option == 2)
			find_average_user($f, $index, $option);
	}
}
?>
