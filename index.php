<?php

 require 'conf/abs_paths.php';

spl_autoload_register(function($class){
	require './route/'.$class.'.php';
});

 $root = new Router();