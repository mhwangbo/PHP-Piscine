#!/usr/bin/env php
<?php
function ft_split($str)
{
	$array = array_filter(explode(" ", $str));
	sort($array);
	return ($array);
}

if ($argc == 2)
{

}
?>