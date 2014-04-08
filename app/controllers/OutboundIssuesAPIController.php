<?php

class OutboundIssuesAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $outboundissue_arr = Outboundissue::all()->toArray();
        $outboundissue['page'] = 1;
        $outboundissue['total'] = 1;
        $outboundissue['records'] = count($outboundissue_arr);
        $outboundissue['rows'] = $outboundissue_arr;
        foreach ($outboundissue['rows'] as $key=>$value) {
            $outboundissue['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='enquissubox' />";
        }
        return $outboundissue;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $obi = new Outboundissue;
        $obi->client_code   	= $postObj->client_code;
        $obi->order_no  		= $postObj->order_no;
        $obi->order_date     	= $postObj->order_date;
        $obi->issue_no          = $postObj->issue_no;
        $obi->issue_date        = $postObj->issue_date;
        $obi->customer_po       = $postObj->customer_po;
        $obi->consignee_code    = $postObj->consignee_code;
        $obi->forwarder_code    = $postObj->forwarder_code;
        $obi->shipment_type     = $postObj->shipment_type;
        $obi->movement_type 	= $postObj->movement_type;
        $obi->status      		= $postObj->status;
        $obi->details 			= $postObj->details;
        $obi->product_no      	= $postObj->product_no;
        $obi->issue_price   	= $postObj->issue_price;
        $obi->discount_price    = $postObj->discount_price;
        $obi->location_no   	= $postObj->location_no;
        $obi->product_disc   	= $postObj->product_disc;
        $obi->uom   			= $postObj->uom;
        $obi->order_qty   		= $postObj->order_qty;
        $obi->issue_qty   		= $postObj->issue_qty;
        $obi->total_issue_price = $postObj->total_issue_price;
        $obi->location_qty   	= $postObj->location_qty;
        $obi->save(); 
        return $obi->id;
    }

    public function show($id)
    {
        $obi = Outboundissue::find($id);
        return $obi;
    }

    public function update($id)
    {
        $obi = Outboundissue::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $obi->client_code   	= $postObj->client_code;
        $obi->order_no  		= $postObj->order_no;
        $obi->order_date     	= $postObj->order_date;
        $obi->issue_no          = $postObj->issue_no;
        $obi->issue_date        = $postObj->issue_date;
        $obi->customer_po       = $postObj->customer_po;
        $obi->consignee_code    = $postObj->consignee_code;
        $obi->forwarder_code    = $postObj->forwarder_code;
        $obi->shipment_type     = $postObj->shipment_type;
        $obi->movement_type 	= $postObj->movement_type;
        $obi->status      		= $postObj->status;
        $obi->details 			= $postObj->details;
        $obi->product_no      	= $postObj->product_no;
        $obi->issue_price   	= $postObj->issue_price;
        $obi->discount_price    = $postObj->discount_price;
        $obi->location_no   	= $postObj->location_no;
        $obi->product_disc   	= $postObj->product_disc;
        $obi->uom   			= $postObj->uom;
        $obi->order_qty   		= $postObj->order_qty;
        $obi->issue_qty   		= $postObj->issue_qty;
        $obi->total_issue_price = $postObj->total_issue_price;
        $obi->location_qty   	= $postObj->location_qty;
        $obi->save(); 
        return $obi->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Outboundissue::destroy($ids);
        return "true";
    }
}