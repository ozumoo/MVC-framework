<?php

/**
 * Base Controller
 */
class Controller
{
	
	function __construct()
	{
		$this->view = new View();

		if (file_exists('xyz')) {
			require 'models/'.$name.'_model.php';
		}

	}

	public function loadModel($name)
	{

		$path =  'models/'.$name.'_model.php' ; 

		if (file_exists($path)) {
			require $path;
			$modelName  = $name .'_Model';
			$this->model =  new $modelName ;
		}
	}
}