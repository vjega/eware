<?php

class ReasonCodesAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $reasoncode_arr = Reasoncode::all()->toArray();
        $reasoncode['page'] = 1;
        $reasoncode['total'] = 1;
        $reasoncode['records'] = count($reasoncode_arr);
        $reasoncode['rows'] = $reasoncode_arr;
        foreach ($reasoncode['rows'] as $key=>$value) {
            $reasoncode['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='reasoncodebox' />";
        }
        return $reasoncode;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $reasoncode = new Reasoncode;
        $reasoncode->reason_code  = $postObj->reason_code;
        $reasoncode->reason_type  = $postObj->reason_type;
        $reasoncode->description  = $postObj->description;
        $reasoncode->save(); 
        return $reasoncode->id;
    }

    public function show($id)
    {
        $reasoncode = Reasoncode::find($id);
        return $reasoncode;
    }

    public function update($id)
    {
        $reasoncode = Reasoncode::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $reasoncode->reason_code  = $postObj->reason_code;
        $reasoncode->reason_type  = $postObj->reason_type;
        $reasoncode->description  = $postObj->description;
        $reasoncode->save(); 
        return $reasoncode->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Reasoncode::destroy($ids);
        return "true";
    }
}