<?php

/**
 * Bootstrap Method
 */
class Bootstrap 
{
	
	function __construct()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null  ;
		$url = rtrim($url,'/');
		$url = explode('/',$url);

		// print_r($url);

		if (empty($url[0])) {
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}

		//controllers
		$file = "controllers/" ."$url[0]".  ".php";
		if (file_exists($file)) {
			require $file  ;
			$error = new Error();
			
		} else {
			require "controllers/error.php"; 
			$error = new ErrorController();
			return false;
		}
		$controller = new $url[0] ; 

		//more argumet  [id]   posts/sports/id
		if (isset($url[2])) {
			if (method_exists($controller,$url[1])) {
				$controller->{$url[1]}(10);
			} else {
				echo "errr";
			}

 		} else {
			//methods
			if (isset($url[1])) {
				$controller->{$url[1]}();
 			} else {
				$controller->index();
 			}
		}


	}
}


