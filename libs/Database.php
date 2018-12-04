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
		ksort($data);

		$fieldNames = implode('`,`', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
		
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`)  VALUES ($fieldValues)");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key" ,$value);
		}
		$sth->execute();
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
		ksort($data);

		$fieldDetails = null;
		foreach ($data as $key => $value) {
			$fieldDetails .= "`$key` = :$key,";
		}
		$fieldDetails = rtrim($fieldDetails , ',');
		
		$sth = $this->prepare("UPDATE  $table SET $fieldDetails  WHERE $where");
		
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key" ,$value);
		}
		$sth->execute();
	}
}