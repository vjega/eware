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
            $stocktake['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='stockbox' />";
        }
        return $stocktake;
    }
	
    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
		$stock = new Stocktake;
        $stock->client_code        = $postObj->client_code;
        $stock->cycle_count_date   = $postObj->cycle_count_date;
        $stock->reference_no       = $postObj->reference_no;
        $stock->status             = $postObj->status;
        $stock->remarks 		   = $postObj->remarks;
        $stock->stock  			   = $postObj->stock;
        $stock->mark  			   = $postObj->mark;
        // $stock->confirm_cycle_count= $postObj->confirm_cycle_count;
        $stock->save();
		$stock_id = $stock->id;
        $postLineData =  Input::get("lineitems");
		$postLineObj = json_decode($postLineData);
        foreach ($postLineObj as $lines) {
		$stocktakesline = new Stocktakesline;
			// if($lines->adjminusqty){
				// $qtyPlusMinus = '-'.$lines->adjminusqty;
			// }else{
				// $qtyPlusMinus = $lines->adjplusqty;
			// }

			$stocktakesline->stocktake_id   		= $stock->id;
			$stocktakesline->location_id    	= $lines->location;
			$stocktakesline->product_id			= $lines->itemcode;
			$stocktakesline->qty          		= $lines->qty;
			// $stocktakesline->qty_plus_minus     = $qtyPlusMinus;
			$stocktakesline->save();
			$itemledger = new Itemledger;
            $itemledger->qty             = $lines->qty;
            $itemledger->cust_code       = $postObj->client_code;
            $itemledger->location_code   = $lines->location;
            $itemledger->item_code       = $lines->itemcode;
            $itemledger->ref_no    = $postObj->reference_no;
            $itemledger->narration       = "StockTakes";
            $itemledger->status          =  "1";
            $itemledger->save();
        }
        return $stock->id;
    }

    public function show($id)
    {
        $stock = Stocktake::find($id);
        return $stock;
    }

    public function update($id)
    {
        $stock     			 = Stocktake::find($id);
        $postData			 = Input::get("data");
        $postObj 			 = json_decode($postData);
        $stock->client_code        = $postObj->client_code;
        $stock->cycle_count_date   = $postObj->cycle_count_date;
        $stock->reference_no       = $postObj->reference_no;
        $stock->status             = $postObj->status;
        $stock->remarks 		   = $postObj->remarks;
        $stock->stock  			   = $postObj->stock;
        $stock->mark  			   = $postObj->mark;
        // $stock->confirm_cycle_count= $postObj->confirm_cycle_count;
        $stock->save(); 
		// $stock_id = $stock->id;
        // $postLineData =  Input::get("lineitems");
		// $postLineObj = json_decode($postLineData);
		// $stocktakesline = new StocktakesLine;
        // foreach ($postLineObj as $lines) {
			// if($lines->adjminusqty){
				// $qtyPlusMinus = '-'.$lines->adjminusqty;
			// }else{
				// $qtyPlusMinus = $lines->adjplusqty;
			// }

			// $stocktakesline->adjustment_id   	= $adjust->id;
			// $stocktakesline->location_id    	= $lines->location;
			// $stocktakesline->product_id			= $lines->itemcode;
			// $stocktakesline->qty          		= $lines->qty;
			// $stocktakesline->qty_plus_minus     = $qtyPlusMinus;
			// $stocktakesline->save();
        // }
        return $stock->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Stocktake::destroy($ids);
        return "true";
    }
}