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

		/*$pattern = '~{(.*?)}~';

		$subject = '/wqeqwe/{id:int}/{some:str}';

		$subject = explode('/', $subject);

		$replacement = '$1';

		$res = preg_grep($pattern, $subject);

		foreach ($subject as $key => $value) {
			if (preg_match("~{(.*?)}~", $value))
			{
				$subject[$key] =  preg_replace('~(int)~', '([0-9]+)', $value);
			}
		}
		
		dump($subject);*/
		
		/*$pattern = '/';

		$subject = '/';


		if (preg_match("~$pattern\Z~i", $subject, $match))
		{
			dump($match);
		}*/

		$controller = $web->spot();

		dump($controller);
	}
}

function dump($arr)
{
	echo '<pre>';
	var_dump($arr);
	echo '</pre>';
	exit();
}