<?php

class CompaniesController extends \BaseController {

	/**
	 * Display a html for companies
	 * Note: We use this only for html. All other data are taken from JSON based REST Access
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('companies.index');
	}
	
}