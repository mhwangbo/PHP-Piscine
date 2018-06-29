#!/usr/bin/env php
<?php

function get_name($image)
{
	preg_match("/^.*?([^\/]+)$/", $image, $output);
	if (substr($output[1], -1) === "\"" || substr($output[1], -1) === "'")
		return (substr($output[1], 0, -1));
	return ($output[1]);
}

if ($argc < 1)
	exit ();

$ch = curl_init($argv[1]);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($ch);
curl_close($ch);

if (!empty($html))
{
	preg_match_all("/<img[^>]+SRC=([^\s>]+)/i", $html, $output);
	foreach ($output[1] as $key => $value)
	{
		$output[1][$key] = trim($value, "\"");
		if (!preg_match("/^http(s?):\/\//", $output[1][$key]))
		{
			if (preg_match("/^\//", $output[1][$key]))
			{
				preg_match("/^(http(s?):\/\/)([^\/]+)/", $argv[1], $output_2);
				$output[1][$key] = $output_2[1]."".$output_2[3]."".$output[1][$key];
			}
			else
			{
				$output[1][$key] = $argv[1]."".$output[1][$key];
			}
		}
	}
	$folder = preg_replace("/^.*?:\/\//", '', $argv[1]);
	if (!file_exists($folder) || !is_dir($folder))
		mkdir($folder);
	foreach($output[1] as $image)
	{
		$ch = curl_init($image);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		$data = curl_exec($ch);
		curl_close($ch);
		$f = fopen($folder.'/'.get_name($image),'w');
		fwrite($f, $data);
		fclose($f);
	}
}
?>
