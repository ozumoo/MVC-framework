<?php

/**
 * Bootstrap Method
 */
class Bootstrap 
{
	
	function __construct()
	{
		$url = $_GET['url'];
		$url = rtrim($url,'/');
		$url = explode('/',$url);

		//controllers
		$file = "controllers/" ."$url[0]".  ".php";
		if (file_exists($file)) {
			require $file  ;
			$error = new Error();
			
		} else {
			require "controllers/error.php"; 
			$error = new Error();
			return false;
		}
		$controller = new $url[0] ; 

		//more argumet  [id]   posts/sports/id
		if (isset($url[2])) {
			$controller->{$url[1]}(10);
		} else {
			//methods
			if (isset($url[1])) {
				$controller->{$url[1]}();
			}
		}

	}
}


