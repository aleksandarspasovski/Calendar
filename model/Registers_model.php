<?php 
require "vendor/autoload.php";
use \Firebase\JWT\JWT;

class Registers_model extends Database
{
	function __construct()
	{
		parent::__construct();
	}
	public function users($username, $password)
	{
		$db = $this->db;
		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);
		var_dump($username, $password);
		$sql = 'insert into users values(null, "'.$username.'", "'.$password.'")';
		$res = $db->query($sql);

		return $res;
		var_dump($res);die;
		var_dump($this->db);die;
	}
}