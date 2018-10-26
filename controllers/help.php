<?php

/**
 * help page
 */
class Help
{
	
	function __construct()
	{
		echo "inside help <br>" ;
	}

	public function other($arg = false) 
	{
		echo "we are inside other <br>";
		echo "optional Arg:$arg";
	}
}