<?php

/**
 * Login Model
 */
class Login_Model extends Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function run()
	{

		$sth = $this->db->prepare(" SELECT id,role FROM users WHERE login = :login AND password  = :password  ");
		$sth->execute(array(
			':login' => $_POST['login'] , 
			':password' => Hash::create('md5',$_POST['password'],HASH_PASSWORD_KEY)
		)); 
		$data = $sth->fetch(); 

		$count = $sth->rowCount();
		if ($count > 0) {
			Session::init();
			Session::set('loggedIn' , true); 
			Session::set('role' , $data['role']); 
			header('location: ../dashboard');
		} else {
			header('location: ../login'); 
		}
	}

}