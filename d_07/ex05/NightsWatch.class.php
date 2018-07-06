<?php

class NightsWatch implements IFighter
{
	private $recruits;

	public function recruit($name)
	{
		if ($name instanceof IFighter)
		{
			$this->recruits[] = $name;
		}
	}

	public function fight()
	{
		foreach ($this->recruits as $key => $value) {
			$value->fight();
		}
	}

}
?>
