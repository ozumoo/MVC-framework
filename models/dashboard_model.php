<?php

/**
 * Dashboard Model
 */
class Dashboard_model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function xhrInsert()
	{
		$text = $_POST['text'];
		$sth  = $this->db->insert('data' , array('text' => $text));
		
		$data =  array('text' => $text , 'id' => $this->db->lastInsertId()  );
		echo json_encode($data);
	}

	public function xhrGetListings()
	{
		$data = $this->db->select("SELECT * FROM data");
		echo   json_encode($data);
	}

	public function xhrDeleteListing()
	{
		$id = $_POST['id'];
		$sth = $this->db->delete('DELETE  FROM data WHERE id =  "'.$id.'"  ');
	}
}