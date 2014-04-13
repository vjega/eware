<?php

class LocationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $sites = Site::all(['client_code', 'name']);
        return View::make('locations.index')->with('sites', $sites);
	}

}