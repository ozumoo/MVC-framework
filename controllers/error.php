<?php

/**
 * ErrorController Class
 */
class ErrorController extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->index();
	}

	public function index()
	{
		$this->view->errorMessage = "this page doesn't exist";
		$this->view->render('error/index');
	}
}