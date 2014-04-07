<?php

class ConfirmSRVsAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
		$confirmsrv_arr = Confirmsrv::all()->toArray();
        $confirmsrv['page'] = 1;
        $confirmsrv['total'] = 1;
        $confirmsrv['records'] = count($confirmsrv_arr);
        $confirmsrv['rows'] = $confirmsrv_arr;
        foreach ($confirmsrv['rows'] as $key=>$value) {
            $confirmsrv['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='rvsbox' />";
        }
        return $confirmsrv;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $confirmsrv = new Confirmsrv;
        $confirmsrv->client_code  = $postObj->client_code;
        $confirmsrv->rv_no        = $postObj->rv_no;
        $confirmsrv->save(); 
        return $confirmsrv->id;
    }

    public function show($id)
    {
        $confirmsrv = Confirmsrv::find($id);
        return $confirmsrv;
    }

    public function update($id)
    {
        $confirmsrv = Confirmsrv::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $confirmsrv->client_code  = $postObj->client_code;
        $confirmsrv->rv_no        = $postObj->rv_no;
        $confirmsrv->save(); 
        return $confirmsrv->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Confirmsrv::destroy($ids);
        return "true";
    }
}