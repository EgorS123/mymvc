<?php

Route::get('/', 'SiteController', 'index');

Route::get('/posts', 'SiteController', 'posts');

Route::get('/post/{int}/{str}', 'SiteController', 'post1');

Route::get('/post/{str}/{int}', 'SiteController', 'post2');

Route::get('/some/{}/some', 'SiteController', 'some');