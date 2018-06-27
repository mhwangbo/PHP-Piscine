#!/usr/bin/env php
<?php
function make_upper($matches)
{
	$tmp = strtoupper($matches[2]);

	return "$matches[1]$tmp$matches[3]$matches[4]";
}

function make_upper2($matches)
{
	$tmp = strtoupper($matches[2]);
	return "$matches[1]$tmp";
}

if ($argc == 2)
{
	$file = file_get_contents($argv[1]);
	$file = preg_replace_callback("/(<a href=.*?>)(.*?)(.<.*?)/s", 'make_upper', $file);
	$file = preg_replace_callback("/(title=)(\".*?\")/", 'make_upper2', $file);
	echo $file;
}
?>
