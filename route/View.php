<?php 

class View
{
	
	function __construct()
	{
		
	}

	public function render($name, $def = false)
	{
		if ($def == true) {
			require 'view/' . $name . '.php';
		} else {
			require 'view/include/header.php';
			require 'view/' . $name . '.php';
			require 'view/include/footer.php';			
		}
	} 
}