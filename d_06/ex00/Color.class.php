<?php
class Color
{
	private $red;
	private $green;
	private $blue;

	function __construct($color)
	{
		if (isset($color['red']) && isset($color['green']) && isset($color['blue']))
		{
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
	}
	function __toString()
	{
		
	}
