<?php
class Jaime extends Lannister
{
	public function who($name)
	{
		if (get_parent_class($name) !== "Lannister")
			return("Let's do this");
		elseif (get_class($name) === "Cersei") 
			return("With pleasure, but only in a tower in Winterfell, then.");
		else
			return ("Not even if I'm drunk !");
	}
}
?>
