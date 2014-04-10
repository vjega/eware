<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$country_options = DB::table('countries')->orderBy('short_name', 'asc')->lists('short_name','id');	
		return View::make('locations.index')->with('country_options',$country_options);
	}

}