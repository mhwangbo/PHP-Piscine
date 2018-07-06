<?php
class Tyrion extends Lannister
{
	public function who($name)
	{
		if (get_parent_class($name) !== "Lannister")
			return ("Let's do this");
		else
			return ("Not even if I'm drunk !");
	}
}
?>
