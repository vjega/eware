<?php

class LocTransfersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() 
	{
		$clients = Client::all(['client_code', 'name']);
		$locations = Location::all(['id', 'location_no']);
		return View::make('loctransfers.index')->with('clients',$clients)->with('locations',$locations); 

	}

}