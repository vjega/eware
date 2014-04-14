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
            $adjustments['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='adjustmentbox' />";
        }
        return $adjustments;
    }
	
    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $adjust = new Adjustment;
        $adjust->client_code   		= $postObj->client_code;
        $adjust->adjustment_date    = $postObj->adjustment_date;
        $adjust->adjustment_number  = $postObj->adjustment_number;
        $adjust->remarks          	= $postObj->remarks;
        $adjust->reference_no       = $postObj->reference_no;
        $adjust->adjustment_view    = $postObj->adjustment_view;
        $adjust->save();
		$adjust_id = $adjust->id;
        $postLineData =  Input::get("lineitems");
		$postLineObj = json_decode($postLineData);
		$adjustline = new AdjustmentLine;
        foreach ($postLineObj as $lines) {
			if($lines->adjminusqty){
				$qtyPlusMinus = '-'.$lines->adjminusqty;
			}else{
				$qtyPlusMinus = $lines->adjplusqty;
			}

			$adjustline->adjustment_id   	= $adjust->id;
			$adjustline->location_id    	= $lines->location;
			$adjustline->product_id			= $lines->itemcode;
			$adjustline->qty          		= $lines->qty;
			$adjustline->qty_plus_minus     = $qtyPlusMinus;
			$adjustline->save();
        }
        return $adjust->id;
    }

    public function show($id)
    {
        $adjust = Adjustment::find($id);
        return $adjust;
    }

    public function update($id)
    {
        $adjust = Adjustment::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
         $adjust->client_code   		= $postObj->client_code;
        $adjust->adjustment_date    = $postObj->adjustment_date;
        $adjust->adjustment_number  = $postObj->adjustment_number;
        $adjust->remarks          	= $postObj->remarks;
        $adjust->reference_no       = $postObj->reference_no;
        $adjust->adjustment_view    = $postObj->adjustment_view;
        $adjust->save(); 
        return $adjust->id;
        
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Adjustment::destroy($ids);
        return "true";
    }
}