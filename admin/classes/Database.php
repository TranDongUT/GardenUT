<?php

/**
 * 
 */
class Database
{
	
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $db = "gardenut";

	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "root", "", "gardenut");
		return $this->con;
	}
	
}

?>