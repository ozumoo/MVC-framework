<?php

class Database extends PDO {

	function __construct($DB_TYPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS)
	{
		parent::__construct($DB_TYPE . ':host=' . $DB_HOST .';dbname=' . $DB_NAME , $DB_USER , $DB_PASS);
	}
	/**
	 * Insert data into database
	 * @param  [string] $table [name of table we gonna to insert]
	 * @param  [string] $data  [associative array]
	 * @return [boolean]       [True || false ]
	 */
	public function insert($table , $data)
	{
		
		var_dump($data);
		ksort($data);
		die();
		$sth = $this->db->prepare("INSERT INTO $table
			(`login`,`password`,`role`) 
			VALUES (:login,:password,:role)	
		");
		$sth->execute(array(
			':login' => $data['login'] , 
			':password' => Hash::create('md5', $data['password'] , HASH_PASSWORD_KEY) ,
			':role' => $data['role']
		));
	}

	/**
	 * update data into database
	 * @param  [string] $table [name of table we gonna to update]
	 * @param  [string] $data  [associative array]
	 * @param  [string] $where [where query]
	 * @return [boolean]       [True || false ]
	*/
	public function update($table , $data , $where)
	{
		$sth = $this->db->prepare("INSERT INTO $table
			(`login`,`password`,`role`) 
			VALUES (:login,:password,:role)	
		");
		$sth->execute(array(
			':login' => $data['login'] , 
			':password' => Hash::create('md5', $data['password'] , HASH_PASSWORD_KEY) ,
			':role' => $data['role']
		));
	}
}