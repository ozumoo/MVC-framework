<?php

/**
 * help page
 */
class Help extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo "inside help <br>" ;
	}

	public function other($arg = false) 
	{
		echo "we are inside other <br>";
		echo "optional Arg:$arg";

		require 'models/help_model.php';
		$model = new Help_Model;
	}
}