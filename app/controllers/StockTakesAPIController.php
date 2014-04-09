<?php

class StockTakesAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $stocktake_arr = Stocktake::all()->toArray();
        $stocktake['page'] = 1;
        $stocktake['total'] = 1;
        $stocktake['records'] = count($stocktake_arr);
        $stocktake['rows'] = $stocktake_arr;
        foreach ($stocktake['rows'] as $key=>$value) {
            $stocktake['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='uombox' />";
        }
        return $stocktake;
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