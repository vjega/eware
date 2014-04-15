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
            $loctransfer['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='loctransferbox' />";
        }
        return $loctransfer;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $loctransfers = new Loctransfer;
        $loctransfers->client_code   	  = $postObj->client_code;
        $loctransfers->movement_date      = $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $postObj->movement_date)));
        $loctransfers->movement_number    = $postObj->movement_number;
        $loctransfers->remarks            = $postObj->remarks;
        $loctransfers->reference_no       = $postObj->reference_no;
        $loctransfers->movement_view      = $postObj->movement_view;
        $loctransfers->save();
		$loctransfers_id = $loctransfers->id;
        $postLineData =  Input::get("lineitems");
		$postLineObj = json_decode($postLineData);
		$loctransferline = new Loctransferline;
        foreach ($postLineObj as $lines) {
			$loctransferline->loctransfer_id   	= $loctransfers_id;
			$loctransferline->location_id   	= $lines->location;
			$loctransferline->product_id		= $lines->itemcode;
			$loctransferline->qty          		= $lines->qty;
			$loctransferline->to_location    	= $lines->tolocation;
			$loctransferline->qty_to_move   	= $lines->qtytomove;
			$loctransferline->save();
        }
        return $loctransferline->id;
    }

    public function show($id)
    {
        $loctransfer = Loctransfer::find($id);
        return $loctransfer;
    }

    public function update($id)
    {
        $loctransfers = Loctransfer::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $loctransfers->client_code   	  = $postObj->client_code;
        $loctransfers->movement_date      = $date = date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $postObj->movement_date)));
        $loctransfers->movement_number    = $postObj->movement_number;
        $loctransfers->remarks            = $postObj->remarks;
        $loctransfers->reference_no       = $postObj->reference_no;
        $loctransfers->movement_view      = $postObj->movement_view;
        $loctransfers->save();
        return $loctransfers->id;
        
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Loctransfer::destroy($ids);
        return "true";
    }
}