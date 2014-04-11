<?php

class SitesController extends \BaseController {

    /**
     * Display a html for companies
     * Note: We use this only for html. All other data are taken from JSON based REST Access
     *
     * @return Response
     */
    public function index()
    {
        $company = Company::all(['id', 'company_name']);
        return View::make('sites.index')->with('company',$company);
    }
    
}