<?php

class LocTransfersAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $loctransfer_arr = Loctransfer::all()->toArray();
        $loctransfer['page'] = 1;
        $loctransfer['total'] = 1;
        $loctransfer['records'] = count($loctransfer_arr);
        $loctransfer['rows'] = $loctransfer_arr;
        foreach ($loctransfer['rows'] as $key=>$value) {
            $loctransfer['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='uombox' />";
        }
        return $loctransfer;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $uom = new Uom;
        $uom->uom_code          = $postObj->uom_code;
        $uom->description  = $postObj->description;
        $uom->save(); 
        return $uom->id;
    }

    public function show($id)
    {
        $uom = Uom::find($id);
        return $uom;
    }

    public function update($id)
    {
        $uom      = Uom::find($id);
        $postData =  Input::get("data");
        $postObj  = json_decode($postData);
        $uom->uom_code     = $postObj->uom_code;
        $uom->description  = $postObj->description;
        $uom->save(); 
        return $uom->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Uom::destroy($ids);
        return "true";
    }
}