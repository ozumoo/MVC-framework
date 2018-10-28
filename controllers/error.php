<?php

/**
 * Error Class
 */
class ErrorHandler extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo "<br> Error <br>";
		$this->view->render('error/index');
		$this->view->msg = "this page doesn't exist";
	}
}