#!/usr/bin/env php
<?php
function ft_split($str)
{
	$array = array_filter(explode("\n", $str));
	sort($array);
	return ($array);
}

function make_upper2($matches)
{
	$tmp = strtoupper($matches[2]);
	return "$matches[1]$tmp";
}

if ($argv < 2 || !file_exists($argv[1]))
	exit();
$file = file_get_contents($argv[1]);
preg_match_all("/<a href=.*?>(.*?)<\/a>/is", $file, $a_tags);
$arr = array();
for($i=0; $i < count($a_tags[1]); $i++)
{
	$a_tags[1][$i] = preg_replace('#<[^>]+>#', "\n", $a_tags[1][$i]);
	$a_tags[1][$i] = strtoupper($a_tags[1][$i]);
	$arr = array_merge($arr, ft_split($a_tags[1][$i]));
}
$file = str_ireplace($arr, $arr, $file);
$file = preg_replace_callback("/(title=)(\".*?\")/", 'make_upper2', $file);
echo $file;
?>
