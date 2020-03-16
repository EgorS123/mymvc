<?php

use App\Post;

class SiteController extends Controller
{
	public static function index()
	{
		Post::check();
		return 'Hello';
	}
}