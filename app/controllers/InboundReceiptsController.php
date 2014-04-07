<?php

class InboundReceiptsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('inboundreceipts.index');
	}

}