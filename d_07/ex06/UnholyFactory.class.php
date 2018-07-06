<?php
class UnholyFactory
{
	private $list = array();
	private $manu = array();

	public function absorb($type)
	{
		if ($type instanceof Fighter)
		{
			if (in_array($type, $this->list))
				print("(Factory already absorbed a fighter of type ");
			else
			{
				print("(Factory absorbed a fighter of type ");
				$this->list[] = clone $type;
			}
			print ($type->getType().")\n");

		}
		else
			print"(Factory can't absorb this, it's not a fighter)\n";
	}

	public function fabricate($type)
	{
		foreach ($this->list as $k => $val)
		{
			foreach ($val as $key => $value)
			{
				if ($type == $value)
				{
					$new = clone $this->list[$k];
					print "(Factory fabricates a fighter of type $type)\n";
					return ($new);
				}
			}
		}
		print "(Factory hasn't absorbed any fighter of type $type)\n";
	}

	public function fight($type)
	{
		print ("OK");
		print_r($this->manu);
	}
}
?>
