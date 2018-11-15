<?php 

/**
 * Base Model 
 */
class Model
{
	
	function __construct()
	{
		$this->db = new Database();
	}
}