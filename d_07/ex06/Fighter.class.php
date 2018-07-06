<?php	
abstract class Fighter
{
	abstract function fight($target);
	public $type_soldier;
	public function __construct($type)
	{
		$this->type_var = $type;
	}
	public function getType()
	{
		return ($this->type_var);
	}
}
?>
