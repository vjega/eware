<?php

class AdjustmentsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all(['client_code', 'name']);
        return View::make('adjustments.index')->with('clients', $clients);
	}

}