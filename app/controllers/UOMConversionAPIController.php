<?php

class UOMConversionAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $uomconversion_arr = Uomconversion::all()->toArray();
        $uomconversion['page'] = 1;
        $uomconversion['total'] = 1;
        $uomconversion['records'] = count($uomconversion_arr);
        $uomconversion['rows'] = $uomconversion_arr;
        foreach ($uomconversion['rows'] as $key=>$value) {
            $uomconversion['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='uomconversionbox' />";
        }
        return $uomconversion;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $uomconversion = new Uomconversion;
        $uomconversion->client_code     = $postObj->client_code;
        $uomconversion->product_number  = $postObj->product_number;
        $uomconversion->from_uom        = $postObj->from_uom;
        $uomconversion->conversion_rate = $postObj->conversion_rate;
        $uomconversion->to_uom          = $postObj->to_uom;
        $uomconversion->save(); 
        return $uomconversion->id;
    }

    public function show($id)
    {
        $uomconversion = Uomconversion::find($id);
        return $uomconversion;
    }

    public function update($id)
    {
        $uomconversion = Uomconversion::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $uomconversion->client_code     = $postObj->client_code;
        $uomconversion->product_number  = $postObj->product_number;
        $uomconversion->from_uom        = $postObj->from_uom;
        $uomconversion->conversion_rate = $postObj->conversion_rate;
        $uomconversion->to_uom          = $postObj->to_uom;
        $uomconversion->save(); 
        return $uomconversion->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Uomconversion::destroy($ids);
        return "true";
    }
}