<?php

class UOMConversionController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all(['client_code', 'id']);
   		$uoms = Uom::all(['uom_code', 'description']);
        return View::make('uomconversion.index')
            ->with('clients',$clients)
            ->with('uoms',$uoms);
	}
}