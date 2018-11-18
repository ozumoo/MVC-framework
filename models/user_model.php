<?php
/**
 * User Model
 */
class User_model extends Model
{
	
	function __construct()
	{
		parent::__construct();	
	}

	public function userList()
	{
		$sth = $this->db->prepare("SELECT * FROM users");
		$sth->execute();
		return $sth->fetchAll();
	}

	public function create($data)
	{
		$sth = $this->db->prepare('INSERT INTO users (`login`,`password`,`role`) VALUES (:login,:password,:role)	');
		$sth->execute(array(
			':login' => $data['login'] , 
			':password' => $data['password'] ,
			':role' => $data['role']
		));
	}	
}