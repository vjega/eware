<?php

class UomAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $uom_arr = Uom::all()->toArray();
        $uom['page'] = 1;
        $uom['total'] = 1;
        $uom['records'] = count($uom_arr);
        $uom['rows'] = $uom_arr;
        foreach ($uom['rows'] as $key=>$value) {
            $uom['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='uombox' />";
        }
        return $uom;
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