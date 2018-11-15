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


		//if empty  --> return default controller [HomePage]
		if (empty($url[0])) {
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}

		//controllers
		$file = "controllers/" ."$url[0]".  ".php";
		//if exists --> require this file 
		if (file_exists($file)) {
			require $file  ;
		} else {
			require "controllers/error.php"; 
			$error = new ErrorController();
			return false;
		}
		//Load Controller -- it's model
		$controller = new $url[0] ; 
		$controller->loadModel($url[0]);

		//more argumet  [id]   posts/sports/id
		if (isset($url[2])) {
			if (method_exists($controller,$url[1])) {
				$controller->{$url[1]}(10);
			} else {
				echo "No parameter is found";
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


