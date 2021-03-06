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

/****** TRANSACTIONS SUBMENU ROUTES STARTS HERE ******/

Route::resource('adjustments', 'AdjustmentsController');
Route::resource('loctransfers', 'LocTransfersController');
//Route::resource('adjustments', 'AdjustmentsController');
Route::resource('stocktakes', 'StockTakesController');

/****** TRANSACTIONS SUBMENU ROUTES ENDS HERE ******/


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
	Route::resource('skuproductsall', 'SKUProductsAPIController@all');
	Route::resource('locations', 'LocationsAPIController');
	Route::resource('uoms', 'UomAPIController');
	Route::resource('uomconversion', 'UOMConversionAPIController');
	Route::resource('reasoncodes', 'ReasonCodesAPIController');
	
	/****** MASTERS SUBMENU ROUTES ENDS HERE ******/

	/****** TRANSACTIONS SUBMENU ROUTES STARTS HERE ******/

	Route::resource('adjustments', 'AdjustmentsAPIController');
	Route::resource('loctransfers', 'LocTransfersAPIController');
	//Route::resource('adjustments', 'AdjustmentsController');
	Route::resource('stocktakes', 'StockTakesAPIController');

	/****** TRANSACTIONS SUBMENU ROUTES ENDS HERE ******/


	/****** INBOUND SUBMENU ROUTES STARTS HERE ******/
	
	Route::resource('inboundreceipts', 'InboundReceiptsAPIController');
	Route::resource('confirmsrvs', 'ConfirmSRVsAPIController');
	
	/****** INBOUND SUBMENU ROUTES ENDS HERE ******/
	
	/****** OUTBOUND SUBMENU ROUTES STARTS HERE ******/		

	Route::resource('outboundissues', 'OutboundIssuesAPIController');
	Route::resource('outboundenquires', 'OutboundEnquiresAPIController');

	/****** OUTBOUND SUBMENU ROUTES ENDS HERE ******/
});

Route::group(array('prefix' => 'upload'), function()
{
	Route::resource('skuxlsimport', 'SkuproductsAPIController@excelimport');
	Route::resource('receiptxlsimport', 'InboundReceiptsAPIController@excelimport');
});

Route::group(array('prefix' => 'reports'), function()
{
	Route::resource('issues', 'ReportFilterController@issues');
	Route::resource('issuexlimport', 'ReportFilterController@issuesxlimport');
	
	Route::resource('clientmaster', 'ReportFilterController@clientmaster');
	Route::resource('clientxlimport', 'ReportFilterController@clientxlimport');
	
	Route::resource('skuproductmaster', 'ReportFilterController@skuproductmaster');
	Route::resource('skuproductxlimport', 'ReportFilterController@skuproductxlimport');
	
	Route::resource('stockledger', 'ReportFilterController@stockledger');
	Route::resource('stockledgerxlimport', 'ReportFilterController@stockledgerxlimport');
	
	Route::resource('locationmovementledger', 'ReportFilterController@locationmovementledger');
	Route::resource('locationledgerxlimport', 'ReportFilterController@locationledgerxlimport');
	
	Route::resource('locationstockledger', 'ReportFilterController@locationstockledger');
	Route::resource('locationstockledgerxlimport', 'ReportFilterController@locationstockledgerxlimport');
	
	Route::resource('receipt', 'ReportFilterController@receipt');
	Route::resource('receiptxlimport', 'ReportFilterController@receiptxlimport');
	
	
});