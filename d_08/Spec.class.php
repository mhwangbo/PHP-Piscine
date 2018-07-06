<?php
trait Spec
{
	public	$size;
	private	$hull_points;
	private	$pp;
	private	$speed;
	private	$handling;
	private	$shield;
	private	$weapons;
	private	$damage;
	public	$use_pp;

	public function __construct($array)
	{
		if (isset(array["size"]) && !empty(array["size"])
			$this->size = $array["size"];
		if (isset(array["hull"]) && !empty(array["hull"])
			$this->hull_points = $array["hull"];
		if (isset(array["pp"]) && !empty(array["pp"])
			$this->pp = $array["pp"];
		if (isset(array["speed"]) && !empty(array["speed"])
			$this->speed = $array["speed"];
		if (isset(array["handling"]) && !empty(array["handling"])
			$this->handling = $array["handling"];
		if (isset(array["shield"]) && !empty(array["shield"])
			$this->shield = $array["shield"];
		if (isset(array["weapon"]) && !empty(array["weapon"])
			$this->weapon = $array["weapon"];
	}

	public function get_damage($attacked)
	{
		$this->damage += $attacked;
		if ($this->damage >= $this->hull_points)
			return (False);
		return (True);
	}

	public function get_hull_point()
	{
		return ($this->hull_points - $this->damage);
	}
	
	public function get_speed($add_speed)
	{
		return ($this->speed + $add_speed);
	}

	public function get_shield($add_shield)
	{
		return ($this->shield + $add_shield);
	}

	public function get_pp()
	{
		return ($this->pp - $use_pp);
		if ($this->pp <= $use_pp)
			return (False);
		return (True);
	}
}
?>
