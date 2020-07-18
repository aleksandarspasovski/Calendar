<?php 

class Router
{
	
	function __construct()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null; 
		$url = rtrim($url, '/');
		$url = explode('/', $url);
		// print_r($url);

		if (empty($url[0])) {
			require 'controller/Home.php';
			$controller = new Home();
			$controller->index();
			return false;
		}

		$file = 'controller/' .$url[0]. '.php';
		if (file_exists($file)) {
			require $file;
		} else{
			require 'controller/Errors.php';
			$controller = new Errors();
			return false;
		}
		$controller = new $url[0];
		$controller->loadModel($url[0]);

		if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				require 'controller/Errors.php';
				$controller = new Errors();
				return false;
			}
		} else{
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else{
					require 'controller/Errors.php';
					$controller = new Errors();
					return false;
				} 
			} else{
				$controller->index();
			}
		}
	}
}