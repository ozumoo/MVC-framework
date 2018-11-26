<?php

/**
 * Hash Class
 */
class Hash 
{

	/**
	 * @param  [string] $algo [Algorithm type depend on usage]
	 * @param  [string] $data [The data to encode]
	 * @param  [string] $salt [signature]
	 * @return [string]       [hashed/salted] data
	*/
	public static function create($algo,$data,$salt) 
	{
		$context = hash_init($algo, HASH_HMAC , $salt);	
		hash_update($context ,$data);

		return hash_final($context) ; 
	}

}