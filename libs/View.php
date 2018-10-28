<?php

/**
 * Base view
 */
class View
{
	
	function __construct()
	{
		echo "Main view";
	}
	public function render($name)
	{
		require "views/" .  $name. ".php";
	}
}