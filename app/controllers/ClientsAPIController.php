<?php

class ClientsAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $clients_arr = Client::all()->toArray();
        $clients['page'] = 1;
        $clients['total'] = 1;
        $clients['records'] = count($clients_arr);
        $clients['rows'] = $clients_arr;
        foreach ($clients['rows'] as $key=>$value) {
            $clients['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='clientbox' />";
        }
        return $clients;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $client = new Client;
        $client->site_id   			= $postObj->site;
        $client->client_code   		= $postObj->client_code;
        $client->name          		= $postObj->name;
        $client->country_code  		= $postObj->country;
        $client->city          		= $postObj->city;
        $client->address       		= $postObj->address;
        $client->fax_no        		= $postObj->fax_no;
        $client->tel_no        		= $postObj->tel_no;
        $client->postal_code   		= $postObj->postal_code;
        $client->contact_name  		= $postObj->contact_name;
        $client->credit_limit  		= $postObj->credit_limit;
        $client->payment_terms 		= $postObj->paymnt_terms;
        $client->business_hour      = $postObj->biz_hour;
        $client->party_service_level= $postObj->order_priority;
        $client->order_priority     = $postObj->order_priority;
        $client->services_provided  = $postObj->service_provided;
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
        $client->site_id   			= $postObj->site;
        $client->client_code   		= $postObj->client_code;
        $client->name          		= $postObj->name;
        $client->country_code  		= $postObj->country;
        $client->city          		= $postObj->city;
        $client->address       		= $postObj->address;
        $client->fax_no        		= $postObj->fax_no;
        $client->tel_no        		= $postObj->tel_no;
        $client->postal_code   		= $postObj->postal_code;
        $client->contact_name  		= $postObj->contact_name;
        $client->credit_limit  		= $postObj->credit_limit;
        $client->payment_terms 		= $postObj->paymnt_terms;
        $client->business_hour      = $postObj->biz_hour;
        $client->party_service_level= $postObj->order_priority;
        $client->order_priority     = $postObj->order_priority;
        $client->services_provided  = $postObj->service_provided;
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