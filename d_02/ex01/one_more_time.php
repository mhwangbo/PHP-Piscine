#!/usr/bin/env php
<?php

$dow = 0;

function error_manage($str, $mois)
{
	$semaine = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$space = 0;
	for ($i = 0; $i < strlen($str); $i++)
	{
		if ($str[$i] == " ")
			$space++;
	}
	$str = explode(" ", $str);
	global $dow;
	$dow = array_search($str[0], $semaine);
	if (($space != 4)
		|| (count($str) != 5)
		|| (!is_numeric($str[1]))
		|| (strlen($str[1]) != 1 && strlen($str[1]) != 2)
		|| (!is_numeric($str[3]))
		|| (strlen($str[3]) != 4)
		|| (in_array(strtolower($str[2]), $mois) == FALSE)
		|| (in_array($str[0], $semaine) == FALSE))
	{
		echo "Wrong Format\n";
		exit (0);
	}
	$str[4] = explode(":", $str[4]);
	if (count($str[4]) != 3)
	{
		echo "Wrong Format\n";
		exit (0);
	}
	foreach ($str[4] as $key => $value)
	{
		if (!is_numeric($value)
			|| strlen($value) != 2)
		{
			echo "Wrong Format\n";
			exit (0);
		}
	}
}

if ($argc == 2)
{
	$mois = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	$month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	$month = array_combine($mois, $month);
	error_manage($argv[1], $mois);
	$argv[1] = strtolower($argv[1]);
	$argv[1] = preg_replace("/^(\w+\s)/", "", $argv[1]);
	$time = str_replace(array_keys($month), array_values($month), $argv[1]);
	$day = date("w",strtotime($time))."\n";
	if ($day != $dow)
	{
		echo "Wrong Format\n";
		exit (0);
	}
	$time_ref = strtotime('1970-01-01 00:00:00');
	$time_cal = strtotime($time);
	$diff = $time_cal - $time_ref;
	echo $diff."\n";
}
?>
