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
		$sth = $this->db->prepare("SELECT id , login , role  FROM users");
		$sth->execute();
		return $sth->fetchAll();
	}
	public function userSingleList($id)
	{ 
		$sth = $this->db->prepare("SELECT id , login , role  FROM users WHERE id = :id");
		$sth->execute(array(
			':id' => $id
		));
		return $sth->fetch();
	}

	public function create($data)
	{
		$this->model->insert('users' , array(
			'login' => 'test' ,
			'password' => 'test' ,
			'role' => 'test' ,
		));
		die();
		$sth = $this->db->prepare('INSERT INTO users (`login`,`password`,`role`) VALUES (:login,:password,:role)	');
		$sth->execute(array(
			':login' => $data['login'] , 
			':password' => Hash::create('md5', $data['password'] , HASH_PASSWORD_KEY) ,
			':role' => $data['role']
		));
	}
	public function editSave($data)
	{	
		$sth = $this->db->prepare('UPDATE users SET `login` = :login , `password` = :password , `role` = :role WHERE id = :id ');
		$sth->execute(array(
			':id'  => $data['id'],
			':login' => $data['login'] , 
			':password' => Hash::create('md5', $data['password'] , HASH_PASSWORD_KEY) ,
			':role' => $data['role']
		));
	}		
	public function delete($id)
	{
		$sth = $this->db->prepare('DELETE FROM users WHERE id  = :id');
		$sth->execute(array(
			':id' => $id
		));
	}


}