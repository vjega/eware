<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$client_code_options = DB::table('clients')->orderBy('client_code', 'asc')->lists('client_code','id');
		Log::info($client_code_options);
		return View::make('locations.index'); //->with('client_code_options',$client_code_options);
	}

}