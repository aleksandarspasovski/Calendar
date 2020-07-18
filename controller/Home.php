<?php 


class Home extends BaseController
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
		$this->view->render('home');
	}
}