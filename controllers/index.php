<?php

/**
 * class for home page
 */
class Index extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		echo "index index ";
		$this->view->render('index/index');
	}
	function details()
	{
		$this->view->render('index/index');
		
	}
}