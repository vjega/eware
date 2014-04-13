<?php

class CompanyAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $com_arr = Company::all()->toArray();
        $companies['page'] = 1;
        $companies['total'] = 1;
        $companies['records'] = count($com_arr);
        $companies['rows'] = $com_arr;
        foreach ($companies['rows'] as $key=>$value) {
            $companies['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='companybox' />";
        }
        return $companies;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $company = new Company;
		$company->country		=$postObj->country;
		$company->region		=$postObj->region;
		$company->currency		=$postObj->currency;
		$company->number_of_site=$postObj->number_of_site;
		$company->site_type		=$postObj->site_type;
		$company->company_name	=$postObj->company_name;
		$company->city			=$postObj->city;
		$company->google_earth	=$postObj->google_earth;
		$company->address1		=$postObj->address1;
		#$company->address2		=$postObj->address2;
		#$company->address3		=$postObj->address3;
		#$company->state		=$postObj->state;
		$company->postal_code	=$postObj->postal_code;
		$company->email			=$postObj->email;
		$company->tel_number1	=$postObj->tel_number1;
		$company->tel_number2	=$postObj->tel_number2;
		$company->fax_number	=$postObj->fax_number;
		$company->tax			=$postObj->tax;
		$company->order_priority=$postObj->order_priority;
		$company->service_level	=$postObj->service_level;
		$company->service_provided=$postObj->service_provided;
		$company->biz_type		=$postObj->biz_type;
		$company->biz_hours		=$postObj->biz_hours;
		$company->credit_limit	=$postObj->credit_limit;
		$company->web_site		=$postObj->web_site;
		#$company->contact_name	=$postObj->contact_name;
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
		$company->country		=$postObj->country;
		$company->region		=$postObj->region;
		$company->currency		=$postObj->currency;
		$company->number_of_site=$postObj->number_of_site;
		$company->site_type		=$postObj->site_type;
		$company->company_name	=$postObj->company_name;
		$company->city			=$postObj->city;
		$company->google_earth	=$postObj->google_earth;
		$company->address1		=$postObj->address1;
		#$company->address2		=$postObj->address2;
		#$company->address3		=$postObj->address3;
		$company->state			=$postObj->state;
		$company->postal_code	=$postObj->postal_code;
		$company->email			=$postObj->email;
		$company->tel_number1	=$postObj->tel_number1;
		$company->tel_number2	=$postObj->tel_number2;
		$company->fax_number	=$postObj->fax_number;
		$company->tax			=$postObj->tax;
		$company->order_priority=$postObj->order_priority;
		$company->service_level	=$postObj->service_level;
		$company->service_provided=$postObj->service_provided;
		$company->biz_type		=$postObj->biz_type;
		$company->biz_hours		=$postObj->biz_hours;
		$company->credit_limit	=$postObj->credit_limit;
		$company->web_site		=$postObj->web_site;
		#$company->contact_name	=$postObj->contact_name;
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