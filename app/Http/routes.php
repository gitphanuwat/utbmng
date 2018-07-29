<?php

Route::get('/','HomeController@index');
Route::resource('/organize','OrganizeController');
Route::resource('/person','PersonController');
Route::resource('/village','VillageController');
Route::resource('/group','GroupController');
Route::resource('/activity','ActivityController');
Route::resource('/tourist','TouristController');
Route::resource('/event','EventController');
Route::get('/eventshow','EventController@active');
Route::resource('/problem','ProblemController');

Route::resource('/info','InfoController');
Route::resource('/polltopic','PolltopicController');
Route::resource('/complaint','ComplaintController');
Route::resource('/download','DownloadController');
Route::resource('/rss','RssController');
Route::resource('/feed','FeedController');

Route::get('/counterhit', 'HomeController@counterhit');
Route::get('/stat', 'HomeController@stat');
Route::get('/loadstat', 'HomeController@loadstat');

Route::get('search','GuestController@search');
Route::get('search','GuestController@getSearch');
Route::post('search','GuestController@postSearch');

Route::get('/{name}', 'Organize\HomeController@index');
Route::resource('/{name}/organize','Organize\OrganizeController');
Route::resource('/{name}/person','Organize\PersonController');
Route::resource('/{name}/village','Organize\VillageController');
Route::resource('/{name}/group','Organize\GroupController');
Route::resource('/{name}/activity','Organize\ActivityController');
Route::resource('/{name}/tourist','Organize\TouristController');
Route::resource('/{name}/event','Organize\EventController');
Route::get('/{name}/eventshow','Organize\EventController@active');
Route::resource('/{name}/problem','Organize\ProblemController');

Route::resource('/{name}/info','Organize\InfoController');
Route::resource('/{name}/polltopic','Organize\PolltopicController');
Route::resource('/{name}/complaint','Organize\ComplaintController');
Route::resource('/{name}/download','Organize\DownloadController');
Route::resource('/{name}/rss','Organize\RssController');

Route::get('/{name}/counterhit', 'Organize\HomeController@counterhit');
Route::get('/{name}/stat', 'Organize\HomeController@stat');
Route::get('/{name}/loadstat', 'Organize\HomeController@loadstat');
