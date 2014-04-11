<?php

class ClientsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$company = Company::all(['id', 'name']);
        return View::make('clients.index')->with('company',$company);
	}
}