<?php

class InboundReceiptsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clients = Client::all(['client_code', 'name']);
        $uoms = Uom::all(['uom_code', 'description']);
        $loc  = Location::all(['location_no','warehouse_name']);
        return View::make('inboundreceipts.index')
            ->with('clients', $clients)
            ->with('uoms', $uoms)
            ->with('locs',$loc);
	}

}