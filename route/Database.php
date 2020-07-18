<?php 

class Database
{
	public $db;
	function __construct()
	{
        $db = new mysqli('127.0.0.1', 'root', 'homosapiens', 'factoryww', '3308');
		$this->db = $db;
    }
}
