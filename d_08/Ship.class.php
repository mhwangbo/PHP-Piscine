<?php
require_once("Spec.class.php");
require_once("Weapon.class.php");

class Ship
{
	use Spec, Weapon;
	public pos_x;
	public pos_y;

	public function __construct($d_arr)
	{
		Spec::__construct($d_arr[0]);
		Weapon::__construct($d_arr[1]);
		if (isset($d_arr[2]["x"]))
			$this->pos_x = $d_arr[2]["x"];
		if (isset($d_arr[2]["y"]))
			$this->pos_y = $d_arr[2]["y"];
	}

	public function move($array)
	{
		if (isset($array["x"]))
			$this->pos_x += $array["x"];
		if (isset($array["y"]))
			$this->pos_y += $array["y"];
	}
}
?>
