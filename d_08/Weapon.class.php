<?php
trait Weapon
{
	public	$charge;
	private	$short;
	private	$middle;
	private	$long;
	public	$effect;

	public function __construct($array)
	{
		if (isset(["charge"]) && !empty(["charge"]))
			$this->charge = $array["charge"];
		if (isset(["short"]) && !empty(["short"]))
			$this->short = $array["short"];
		if (isset(["middle"]) && !empty(["middle"]))
			$this->middle = $array["middle"];
		if (isset(["long"]) && !empty(["long"]))
			$this->long = $array["long"];
		if (isset(["effect"]) && !empty(["effect"]))
			$this->effect = $array["effect"];
	}

	public function get_range($dice)
	{
		if ($dice < 5)
			return($this->short);
		elseif ($dice == 5)
			return ($this->middle);
		else
			return ($this->long);
	}
}
?>
