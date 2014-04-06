<?php

class SiteAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $com_arr = Site::all()->toArray();
        $companies['page'] = 1;
        $companies['total'] = 1;
        $companies['records'] = count($com_arr);
        $companies['rows'] = $com_arr;
        foreach ($companies['rows'] as $key=>$value) {
            $companies['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='sitebox' />";
        }
        return $companies;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $site = new Site;
        $site->company_code = $postObj->company_code;
        $site->name         = $postObj->name;
        $site->country      = $postObj->country;
        $site->region       = $postObj->region;
        $site->city         = $postObj->city;
        $site->currency     = $postObj->currency;
        $site->addrs1       = $postObj->addrs1;
        $site->addrs2       = $postObj->addrs2;
        $site->addrs3       = $postObj->addrs3;
        $site->email        = $postObj->email;
        $site->website      = $postObj->website;
        $site->tel_no1      = $postObj->tel_no1;
        $site->tel_no2      = $postObj->tel_no2;
        $site->fax_no       = $postObj->fax_no;
        $site->postal_code  = $postObj->postal_code;
        $site->biz_type     = $postObj->biz_type;
        $site->biz_hours    = $postObj->biz_hours;
        $site->credit_limit = $postObj->credit_limit;
        $site->priority     = $postObj->priority;
        $site->zonal_level  = $postObj->zonal_level;
        $site->vendor_file  = '';
        $site->customer_file       = '';
        $site->support_source_file = '';
        $site->threepl_file        = '';
        $site->save(); 
        return $site->id;

    }

    public function show($id)
    {
        $site = Site::find($id);
        return $site;
    }

    public function update($id)
    {
        $site = Site::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $site->company_code = $postObj->company_code;
        $site->name         = $postObj->name;
        $site->country      = $postObj->country;
        $site->region       = $postObj->region;
        $site->city         = $postObj->city;
        $site->currency     = $postObj->currency;
        $site->addrs1       = $postObj->addrs1;
        $site->addrs2       = $postObj->addrs2;
        $site->addrs3       = $postObj->addrs3;
        $site->email        = $postObj->email;
        $site->website      = $postObj->website;
        $site->tel_no1      = $postObj->tel_no1;
        $site->tel_no2      = $postObj->tel_no2;
        $site->fax_no       = $postObj->fax_no;
        $site->postal_code  = $postObj->postal_code;
        $site->biz_type     = $postObj->biz_type;
        $site->biz_hours    = $postObj->biz_hours;
        $site->credit_limit = $postObj->credit_limit;
        $site->priority     = $postObj->priority;
        $site->zonal_level  = $postObj->zonal_level;
        $site->save();
        return $site->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Site::destroy($ids);
        return "true";
    }
}