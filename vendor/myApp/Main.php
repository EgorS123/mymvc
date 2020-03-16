<?php

class App
{
	public function __construct()
	{
		AutoLoad::init();

		spl_autoload_register(['AutoLoad', 'load'], true, true); 
	}

	public function run()
	{
		$web = new Route();

		require PATH_ROOT.'/routes/web.php';

		$action = $web->spot();

		$controller = new $action['controller'];

		$rendering = call_user_func_array([$controller, $action['action']], $action['param']);
	
		echo $rendering;
	}
}

function dump($arr)
{
	echo '<pre>';
	var_dump($arr);
	echo '</pre>';
	exit();
}