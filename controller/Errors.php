<?php 

class Errors extends BaseController
{
	function __construct()
	{
		parent::__construct();
		// $msg = 'there is an error';
		// $msg = str_replace(' ', '+', $msg);
		// header('location: ' .$_SERVER['HTTP_REFERER']. $msg);
		// echo 'This page does not exits, cao is errora';
		$this->view->msg = 'This page does not exits';
		$this->view->render('error');
	}

	public function index()
	{
		$this->view->msg = 'This page does not exits';
		$this->view->render('error');

	}
}