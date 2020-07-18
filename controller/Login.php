<?php 


class Login extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		// Session::init();
		// $logged = Session::get('logged', true);
		// if ($logged == false) {
		// 	Session::destroy();
		// 	require 'controller/Errors.php';
		// 	$controller = new Errors();
		// 	exit;
		// }
	}
	public function index()
	{
		$this->view->render('login');
	}
	public function user()
	{
		$err = array();

			if (
				!isset($_POST['username']) ||
				!isset($_POST['password'])
			){
				$err[] = 'Missing fields';
			}

			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			if ($username == '') {
				$err[] = 'Username is required';
			}
			if ($password == '') {
				$err[] = 'Password is required';
			}

			if (count($err) > 0) {
				if (count($err) == 1){
					$err_str = '&err=' . $err[0];
				} else {
					$err_str = implode('&err=', $err);
					$err_str = str_replace(' ', '+', $err_str);
				}
				$err_str = '?' . substr($err_str, 1);
				header('Location: ' . $_SERVER['HTTP_REFERER'] . $err_str);
			}

			$user = new Login_model();
			if ($user->login($username, $password)) {
				header('Location: '.URL.'scheduling');
			} else {
				header('Location: ' . $_SERVER['HTTP_REFERER'] . '?nismo uspeli da pronadjemo korisnika sa odgovarajucim identitetom');
			}
	}
}