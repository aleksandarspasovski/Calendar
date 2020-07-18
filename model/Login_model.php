<?php 

class Login_model extends Database
{
	public function __construct()
	{
		parent::__construct();
	}
	/*Function where is logic method for login user*/
	public function login($username, $password)
	{
		$db = $this->db;
		$username = mysqli_real_escape_string($db, $username);
		$password = mysqli_real_escape_string($db, $password);

		$query = 'select id, username, password from users where username = "'.$username.'" and password = "'.$password.'"';
		// var_dump($query);die;
		$res = $db->query($query);
		// var_dump($res);die;
		$result = $res->fetch_assoc();
		// var_dump($result);die;
		$id = $result['id'];

		$count_rows = $res->num_rows;
		// var_dump($count_rows);die;
		/*loggin user and send to dashboard*/
		if ($count_rows == 1) {
			Session::init();
			$_SESSION['id'] = $id;
			Session::set('logged', $id);
			return true;
		} else {
			return false;
		}
		return $count_rows;
	}
}