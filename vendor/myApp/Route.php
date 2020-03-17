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

		self::$routes[$url] = ['method' => 'get', 'controller' => $controller, 'action' => $action];
	}

	public function spot()
	{
		$find = false;

		foreach (self::$routes as $route => $controller)
		{
			$method = array_shift($controller);

			if ($method == $this->method)
			{
				continue;
			}
			if (preg_match("~$route\Z~", $this->url, $match))
			{
				$find = true;
				array_shift($match);
				$controller['param'] = $match;
				break;
			}
		}
		if ($find)
		{
			return $controller;
		} else
		{
			return ['controller' => 'Controller', 'action' => 'notFind', 'param' => []];
		}
	}
}