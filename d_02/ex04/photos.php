#!/usr/bin/env php
<?php
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $argv[1]);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true); 
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
	$result = curl_exec ($ch);
	preg_match_all("/<img.*?SRC=\"(.*?)\"/i", $result, $output);
	$folder_name = [];
	preg_match("/http:\/\/(.*?)\//i", $argv[1], $folder_name);
	if (!file_exists('./'.$folder_name[1])) 
    	mkdir('./'.$folder_name[1], 0777, true);
	for($i=0; $i < count($output[1]); $i++)
	{
		copy($output[1][$i], './'.$folder_name[1].'/local'.$i);
	}
	print_r ($output);
	curl_close($ch);
?>
