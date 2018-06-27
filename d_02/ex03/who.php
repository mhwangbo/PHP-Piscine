#!/usr/bin/env php
<?php
date_default_timezone_set('America/Los_Angeles');
$f = fopen("/var/run/utmpx", "r");
while ($utmpx = fread($f, 628)){
	$unpack = unpack("a256a/a4b/a32c/id/ie/I2f/a256g/i16h", $utmpx);
	$arr[$unpack['c']] = $unpack;
}
ksort($arr);
foreach ($arr as $v){
	if ($v['e'] == 7) {
		echo str_pad(substr(trim($v['a']), 0, 8), 8, " ")." ";
		echo str_pad(substr(trim($v['c']), 0, 8), 8, " ")." ";
		echo date("M", $v["f1"]);
		echo str_pad(date("j", $v["f1"]), 3, " ", STR_PAD_LEFT)." ".date("H:i", $v["f1"]);
		echo "\n";
	}
}
?>
