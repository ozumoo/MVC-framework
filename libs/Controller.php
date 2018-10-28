<?php

/**
 * Base Controller
 */
class Controller
{
	
	function __construct()
	{
		echo "<br> This is base controller <br>";
		//load the view 
		$this->view = new View;
	}
}