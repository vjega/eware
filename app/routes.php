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


Route::resource('products', 'ProductsController');

Route::resource('parties', 'PartiesController');

Route::resource('Locations', 'LocationsController');

Route::resource('skus', 'SkusController');

Route::resource('inbounds', 'InboundsController');

Route::resource('outbounds', 'OutboundsController');

Route::resource('groups', 'GroupsController');

Route::resource('zones', 'ZonesController');

Route::resource('sites', 'HomeController');


Route::get('/', function()
{
	return View::make('login');
});