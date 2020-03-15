<?php

class AutoLoad
{
	private static $classMap = [];

	public static function init()
	{
		self::$classMap = require PATH_ROOT.'/vendor/classes.php';
	}

	public static function load($class)
	{
		if (isset(self::$classMap[$class]))
		{
			require_once PATH_ROOT.self::$classMap[$class];
		}
	}
}