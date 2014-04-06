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
        $company = new Company;
        $company->name          = $postObj->name;
        $company->country_code  = $postObj->country;
        $company->city          = $postObj->city;
        $company->address       = $postObj->address;
        $company->fax_no        = $postObj->fax_no;
        $company->tel_no        = $postObj->telno;
        $company->postal_code   = $postObj->postal_code;
        $company->contact_name  = $postObj->cont_name;
        $company->credit_limit  = $postObj->credit_limit;
        $company->payment_terms = $postObj->paymnt_terms;
        $company->biz_hour      = $postObj->opening_hours;
        $company->party_service_level = $postObj->order_priority;
        $company->order_priority      = $postObj->order_priority;
        $company->services_provided   = $postObj->service_provided;
        $company->save(); 
        return $company->id;
    }

    public function show($id)
    {
        $company = Company::find($id);
        return $company;
    }

    public function update($id)
    {
        $company = Company::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $company->name          = $postObj->name;
        $company->country_code  = $postObj->country;
        $company->city          = $postObj->city;
        $company->address       = $postObj->address;
        $company->fax_no        = $postObj->fax_no;
        $company->tel_no        = $postObj->telno;
        $company->postal_code   = $postObj->postal_code;
        $company->contact_name  = $postObj->cont_name;
        $company->credit_limit  = $postObj->credit_limit;
        $company->payment_terms = $postObj->paymnt_terms;
        $company->biz_hour      = $postObj->opening_hours;
        $company->party_service_level = $postObj->order_priority;
        $company->order_priority      = $postObj->order_priority;
        $company->services_provided   = $postObj->service_provided;
        $company->save(); 
        return $company->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Company::destroy($ids);
        return "true";
    }
}