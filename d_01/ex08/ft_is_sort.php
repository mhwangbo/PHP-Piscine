#!/usr/bin/env php
<?php
function ft_is_sort($array)
{
	$tmp = $array;
	sort($tmp);

	$flag = true;
	foreach($tmp as $key=>$value)
		if ($value!=$array[$key])
			$flag = false;
	return ($flag);
}
?>
