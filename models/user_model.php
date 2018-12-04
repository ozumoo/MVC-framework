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
		return $sth = $this->db->select("SELECT id , login , role  FROM users");
	}
	public function userSingleList($id)
	{ 
		return $this->db->select("SELECT id , login , role  FROM users WHERE id = :id" , array('id' => $id));
	}

	public function create($data)
	{
		$this->db->insert('users' , array(
			'login' => $data['login'] , 
			'password' => Hash::create('sha256', $data['password'] , HASH_PASSWORD_KEY) ,
			'role' => $data['role']
		));
	}
	public function editSave($data)
	{	
		$postData = array(
			'login' => $data['login'] , 
			'password' => Hash::create('sha256', $data['password'] , HASH_PASSWORD_KEY) ,
			'role' => $data['role']
		);
		$this->db->update('users' , $postData  , " `id` = {$data['id']}");
	}		
	public function delete($id)
	{
		$data = $this->db->select('SELECT role FROM users WHERE id = :id' , array('id' => $id));
		if ($data[0]["role"] == "owner") {
			return false;
		}
		$this->db->delete('users',"id= '$id'");
	}


}