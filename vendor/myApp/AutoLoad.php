<?php

class AutoLoad
{
	private static $classMap = [];
	private static $paths = ['app', 'app/controllers'];

	public static function init()
	{
		self::$classMap = require PATH_ROOT.'/vendor/classes.php';
	}

	public static function load($class)
	{
		$path = PATH_ROOT.'/'.$class.'.php';
		if (file_exists($path))
		{
			require $path;
		}elseif (isset(self::$classMap[$class]))
		{
			require_once PATH_ROOT.self::$classMap[$class];
		} else
		{
			self::staticLoad($class);
		}
	}

	private static function staticLoad($class)
	{
		$find = false;
		foreach (self::$paths as $path)
		{
			$path = PATH_ROOT.'/'.$path.'/'.$class.'.php';
			if (file_exists($path))
			{
				$find = true;
				break;
			}
		}

		if ($find)
		{
			require_once $path;
		} else 
		{
			throw new Exception('Class not find ');
		}
	}
}