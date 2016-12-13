<?php


Route::group(['middleware' => 'web'], function() {
	Route::get('/foo', 'FooController@foo');	
	
    Route::get('/', function(){
	return "Hello World";
	});
	Route::auth();
	Route::get('/home', 'HomeController@index');
	
	Route::get('about','PagesController@about');

	Route::get('contact','PagesController@contact');

	Route::resource('articles','ArticlesController');

	Route::get('tags/{tags}', 'TagsController@show');
	// Route::get('articles', "ArticlesController@index");

	// Route::get('articles/create', "ArticlesController@create");

	// Route::get('articles/{id}', "ArticlesController@show");

	// Route::post('articles', 'ArticlesController@store');
	// Route::get('foo',['middleware'=>'manager',function(){
	// 	return 'This page may only be viewed by managers';
	// }]);

});


