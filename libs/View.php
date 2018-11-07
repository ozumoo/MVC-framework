<?php

/**
 * Base view
 */
class View
{
	
	function __construct()
	{
		// echo "Main view";
	}
	public function render($name , $noIncludes = false)
	{
		if ($noIncludes == true) {
			require "views/" .  $name. ".php";
		} else {
			require 'views/templates/header.php';
			require "views/" .  $name. ".php";
			require 'views/templates/footer.php';
		}
	}
}