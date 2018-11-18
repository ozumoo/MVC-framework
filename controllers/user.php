<?php

/**
 * class for home page
 */
class User extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		$role = Session::get('role');
		if ($logged == false || $role != 'owner') {
			Session::destroy();
			header('location: ../login');
			exit;
		}

	}

	public function index()
	{
		$this->view->userList = $this->model->userList();
		$this->view->render('user/index');
	}

	public function create()
	{
		$data = [];	
		$data['login'] = $_POST['login'];
		$data['password'] = md5($_POST['password']);
		$data['role'] = $_POST['role'];

		// @TODO: Error checking
		$this->model->create($data);
		header('location: '. URL .'user');
	}

	public function edit($id)
	{
		# code...
	}

	public function delete($id)
	{
		# code...
	}

	public function logout()
	{
		Session::destroy();
		header('location: ../login');
			exit;
	}

}
