<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('api/articles', 'Ajax\ArticlesController');
Route::resource('api/cities', 'Ajax\CitiesController');
Route::resource('api/countries', 'Ajax\CountriesController');
Route::resource('api/pix', 'Ajax\PixController');

/**
* Главный роут для AJAX API
*/
Route::any('/ajax/{controller}/{action?}', function($controller, $action = 'index'){
    
    $controller = 'Ajax\\' . ucfirst( strtolower($controller) ) . 'Controller';
    
    $controller = App::make($controller);
    
    $controller->callAction($action, array());
    
    $data = array_merge(array(
        //'success' => false
    ), (array) $controller->data);
    
    return Response::json($data);
});



Route::controller('whois', 'WhoisController');

Route::controller('continents', 'ContinentsController');

Route::get('image/{width?}/{height?}/{id?}', 'ImageController@getIndex');

Route::get('countries/{id?}', 'CountriesController@getIndex');

Route::get('cities/{id?}', 'CitiesController@getIndex');

Route::controller('places', 'PlacesController');

Route::get('art/{translit?}', 'ArticleController@getArticle');

Route::get('sitemap.xml', 'HomeController@getSitemap');

Route::controller('/', 'HomeController');
