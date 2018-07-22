<?php



Route::get('/','HomeController@index');
Route::resource('/organize','OrganizeController');
Route::resource('/person','PersonController');
Route::resource('/village','VillageController');
Route::resource('/group','GroupController');
Route::resource('/activity','ActivityController');
Route::resource('/tourist','TouristController');
Route::resource('/event','EventController');
Route::resource('/problem','ProblemController');

Route::resource('/info','InfoController');
Route::resource('/polltopic','PolltopicController');
Route::resource('/complaint','ComplaintController');
Route::resource('/download','DownloadController');


Route::get('/counterhit', 'HomeController@counterhit');

Route::get('/{name}', 'HomeController@organize');
Route::resource('/{name}/organize','Organize\OrganizeController');
Route::resource('/{name}/person','Organize\PersonController');
Route::resource('/{name}/village','Organize\VillageController');
Route::resource('/{name}/group','Organize\GroupController');
Route::resource('/{name}/activity','Organize\ActivityController');
Route::resource('/{name}/tourist','Organize\TouristController');
Route::resource('/{name}/event','Organize\EventController');
Route::resource('/{name}/problem','Organize\ProblemController');

Route::resource('/{name}/info','Organize\InfoController');
Route::resource('/{name}/polltopic','Organize\PolltopicController');
Route::resource('/{name}/complaint','Organize\ComplaintController');
Route::resource('/{name}/download','Organize\DownloadController');
