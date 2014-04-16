<?php

class OutboundIssuesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all(['client_code', 'name']);
        return View::make('outboundissues.index')
            ->with('clients',$clients);
	}

}