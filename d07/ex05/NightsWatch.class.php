<?php

class NightsWatch
{
	public $fighter = Array();
	public function recruit($name)
	{
		$this->fighter[] = $name;
	}
	public function fight()
	{
        foreach ($this->fighter as $champ)
		{
			$temp = new ReflectionClass($champ);
			$methods = $temp->getMethods();
			$flag = 0;
			foreach ($methods as $methode)
			{
				if ($methode->getName() == "fight")
					$flag = 1;
			}
			if ($flag == 1)
				$champ->fight();
		}
    }
}
?>