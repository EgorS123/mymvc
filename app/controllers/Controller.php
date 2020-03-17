<?php

use myApp\Controllers\BaseController;

class Controller extends BaseController
{
	public function __construct()
	{
		echo 'Controller __construct<br>';
	}

	public function notFind()
	{
		echo '404';
	}
}