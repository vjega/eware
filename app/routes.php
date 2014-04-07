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

Route::resource('companies', 'CompaniesController');

Route::resource('sites', 'SitesController');

	/****** MASTERS SUBMENU ROUTES STARTS HERE ******/

	Route::resource('clients', 'ClientsController');
	Route::resource('skuproducts', 'SKUProductsController');
	Route::resource('locations', 'LocationsController');
	Route::resource('uoms', 'UomController');
	Route::resource('uomconversion', 'UOMConversionController');
	Route::resource('reasoncodes', 'ReasonCodesController');

	/****** MASTERS SUBMENU ROUTES ENDS HERE ******/

	/****** INBOUND SUBMENU ROUTES STARTS HERE ******/

	Route::resource('inboundreceipts', 'InboundReceiptsController');
	Route::resource('confirmsrvs', 'ConfirmSRVsController');

	/****** INBOUND SUBMENU ROUTES ENDS HERE ******/

	/****** OUTBOUND SUBMENU ROUTES STARTS HERE ******/

	Route::resource('outboundissues', 'OutboundIssuesController');
	Route::resource('outboundenquires', 'OutboundEnquiresController');

	/****** OUTBOUND SUBMENU ROUTES ENDS HERE ******/

Route::resource('products', 'ProductsController');

Route::resource('parties', 'PartiesController');

//Route::resource('Locations', 'LocationsController');

Route::resource('skus', 'SkusController');

Route::resource('inbounds', 'InboundsController');

Route::resource('outbounds', 'OutboundsController');

Route::resource('groups', 'GroupsController');

Route::resource('zones', 'ZonesController');

#Route::resource('sites', 'HomeController');


Route::get('/', function()
{
	return View::make('login');
});

// Route group for API versioning
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('companies', 'CompanyAPIController');
    Route::resource('sites', 'SiteAPIController');

		/****** MASTERS SUBMENU ROUTES STARTS HERE ******/
		
		Route::resource('clients', 'ClientsAPIController');
		Route::resource('skuproducts', 'SKUProductsAPIController');
		Route::resource('locations', 'LocationsAPIController');
		Route::resource('uoms', 'UomAPIController');
		Route::resource('uomconversion', 'UOMConversionAPIController');
		Route::resource('reasoncodes', 'ReasonCodesAPIController');
		
		/****** MASTERS SUBMENU ROUTES ENDS HERE ******/
	
		/****** INBOUND SUBMENU ROUTES STARTS HERE ******/
		
		Route::resource('inboundreceipts', 'InboundReceiptsAPIController');
		Route::resource('confirmsrvs', 'ConfirmSRVsAPIController');
		
		/****** INBOUND SUBMENU ROUTES ENDS HERE ******/
		
		/****** OUTBOUND SUBMENU ROUTES STARTS HERE ******/		

		Route::resource('outboundissues', 'outboundissuesAPIController');
		Route::resource('outboundenquires', 'OutboundEnquiresAPIController');

		/****** OUTBOUND SUBMENU ROUTES ENDS HERE ******/
});