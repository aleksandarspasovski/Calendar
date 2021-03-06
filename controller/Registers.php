<?php 


class Registers extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->view->render('registers');
	}
	public function createUser()
	{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$err = array();

		if ($username == '') {
			$err[] = 'Username cannot be empty!';
		}
		if ($password == '') {
			$err[] = 'Password cannot be empty!';
		}
		if (strlen($password) < 8) {
			$err[] = 'Password must have 8 or more characters';
		}
		if (!preg_match("/\d/", $password)) {
		    $err[] = "Password must contain at least one number";
		}
		if (!preg_match("/[a-zA-Z]/", $password)) {
		    $err[] = "Password must contain at least one Letter";
		}
		if (!preg_match("/\W/", $password)) {
		    $err[] = "Password must contain at least one special character";
		}

		if (count($err) > 0) {
			session_start();
			$errors = implode('&err[]=', $err);
			$url = '?' . substr($errors, 0);
			$_SESSION['err'] = $err;
			header('Location: '. URL.'registers');
			exit;
		}

		$obj = new Registers_model();
		$obj->users($username, $password);

	}
}
