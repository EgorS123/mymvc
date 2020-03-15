<?php

class Route
{
	private static $routes;
	private $url, $method;

	public function __construct()
	{
		$this->url = $_SERVER['REQUEST_URI'];
		$this->method = $_SERVER['REQUEST_METHOD'];
	}

	public static function get($url, $controller, $action)
	{
		$url = preg_replace("~{int}~", '([0-9]+)', $url);
		$url = preg_replace("~{str}~", '([a-z]+)', $url);
		$url = preg_replace("~{}~", '(.*?)', $url);

		self::$routes[$url] = [['method' => 'get'], [$controller => $action]];
	}

	public function spot()
	{
		$find = false;

		foreach (self::$routes as $route => $controller)
		{
			$method = array_shift($controller);

			if ($method['method'] == $this->method)
			{
				continue;
			}
			if (preg_match("~$route\Z~", $this->url, $match))
			{
				$find = true;
				array_shift($match);
				extract($controller[0]); 
				$actionController = [];
				$actionController['controller'] = $controller[0];
				$actionController['parameters'] = $match;
				break;
			}
		}
		if ($find)
		{
			return $actionController;
		} else
		{
			return ['controller', 'notFind'];
		}
	}
}