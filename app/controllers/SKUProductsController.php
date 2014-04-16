<?php

class SKUProductsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $clients = Client::all(['client_code', 'name']);
		$location = Location::all(['id', 'location_no']);
		$uoms = Uom::all(['uom_code', 'description']);
        return View::make('skuproducts.index')
			->with('clients',$clients)
			->with('uoms',$uoms)
			->with('location',$location);
	}

}