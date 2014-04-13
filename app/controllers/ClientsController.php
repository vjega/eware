<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$site = Site::all(['id', 'name']);
        return View::make('clients.index')->with('site',$site);
	}
}