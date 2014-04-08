<?php

class AdjustmentsAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $adjustments_arr = Adjustment::all()->toArray();
        $adjustments['page'] = 1;
        $adjustments['total'] = 1;
        $adjustments['records'] = count($adjustments_arr);
        $adjustments['rows'] = $adjustments_arr;
        foreach ($adjustments['rows'] as $key=>$value) {
            $adjustments['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='clientbox' />";
        }
        return $adjustments;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $client = new Client;
        $client->client_code   = $postObj->client_code;
        $client->name          = $postObj->name;
        $client->country_code  = $postObj->country;
        $client->city          = $postObj->city;
        $client->address       = $postObj->address;
        $client->fax_no        = $postObj->fax_no;
        $client->tel_no        = $postObj->tel_no;
        $client->postal_code   = $postObj->postal_code;
        $client->contact_name  = $postObj->contact_name;
        $client->credit_limit  = $postObj->credit_limit;
        $client->payment_terms = $postObj->paymnt_terms;
        $client->business_hour      = $postObj->biz_hour;
        $client->party_service_level = $postObj->order_priority;
        $client->order_priority      = $postObj->order_priority;
        $client->services_provided   = $postObj->service_provided;
        $client->save(); 
        return $client->id;
    }

    public function show($id)
    {
        $client = Client::find($id);
        return $client;
    }

    public function update($id)
    {
        $client = Client::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $client->client_code   = $postObj->client_code;
        $client->name          = $postObj->name;
        $client->country_code  = $postObj->country;
        $client->city          = $postObj->city;
        $client->address       = $postObj->address;
        $client->fax_no        = $postObj->fax_no;
        $client->tel_no        = $postObj->tel_no;
        $client->postal_code   = $postObj->postal_code;
        $client->contact_name  = $postObj->contact_name;
        $client->credit_limit  = $postObj->credit_limit;
        $client->payment_terms = $postObj->paymnt_terms;
        $client->business_hour      = $postObj->biz_hour;
        $client->party_service_level = $postObj->order_priority;
        $client->order_priority      = $postObj->order_priority;
        $client->services_provided   = $postObj->service_provided;
        $client->save(); 
        return $client->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Client::destroy($ids);
        return "true";
    }
}