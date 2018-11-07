<?php

/**
 * ErrorController Class
 */
class ErrorController extends Controller
{
	private $msg="text" ; 
	function __construct()
	{
		parent::__construct();
		// echo "<br> Error <br>";
	
	}

	function index()
	{
		$this->view->render('error/index');
		$this->view->msg = "this page doesn't exist";
	}
}