<?php

class OutboundEnquiresAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $outboundenquires_arr = Outboundenquiry::all()->toArray();
        $outboundenquires['page'] = 1;
        $outboundenquires['total'] = 1;
        $outboundenquires['records'] = count($outboundenquires_arr);
        $outboundenquires['rows'] = $outboundenquires_arr;
        foreach ($outboundenquires['rows'] as $key=>$value) {
            $outboundenquires['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='enqbox' />";
        }
        return $outboundenquires;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $obe = new Outboundenquiry;
        $obe->search   = $postObj->search;
        $obe->purpose  = $postObj->purpose;
        $obe->save(); 
        return $obe->id;
    }

    public function show($id)
    {
        $obe = Outboundenquiry::find($id);
        return $obe;
    }

    public function update($id)
    {
        $obe = Outboundenquiry::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
		$obe->search   = $postObj->search;
        $obe->purpose  = $postObj->purpose;
        $obe->save(); 
        return $obe->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Outboundenquiry::destroy($ids);
        return "true";
    }
    
}