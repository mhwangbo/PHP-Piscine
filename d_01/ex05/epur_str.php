#!/usr/bin/env php
<?php
if (count($argv) == 2)
{
	$str = trim(preg_replace('/\s+/', ' ', $argv[1]));
	echo "$str\n";
}
?>
