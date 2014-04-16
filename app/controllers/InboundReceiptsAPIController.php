<?php

class InboundReceiptsAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        $inboundreceipt_arr = Inboundreceipt::all()->toArray();
        $inboundreceipt['page'] = 1;
        $inboundreceipt['total'] = 1;
        $inboundreceipt['records'] = count($inboundreceipt_arr);
        $inboundreceipt['rows'] = $inboundreceipt_arr;
        foreach ($inboundreceipt['rows'] as $key=>$value) {
            $inboundreceipt['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='receiptybox' />";
        }
        return $inboundreceipt;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $receipt = new Inboundreceipt;
        $receipt->client_code       = $postObj->client_code;
        $receipt->grn_date  		= $postObj->grn_date;
        $receipt->grn_no            = $postObj->grn_no;
        $receipt->po_no       		= $postObj->po_no;
        $receipt->invoice_no        = $postObj->invoice_no;
        $receipt->transport_mode    = $postObj->transport_mode;
        $receipt->forwarder_code    = $postObj->forwarder_code;
        $receipt->supplier_code     = $postObj->supplier_code;
        $receipt->rv_no  			= $postObj->rv_no;
        $receipt->product_no 		= $postObj->product_no;
        $receipt->expiry_date       = $postObj->expiry_date;
        $receipt->uom 				= $postObj->uom;
        $receipt->status      		= $postObj->status;
        $receipt->expected_qty   	= $postObj->expected_qty;
        $receipt->delivery_qty   	= $postObj->delivery_qty;
        $receipt->accepted_qty   	= $postObj->accepted_qty;
        $receipt->rejected_qty   	= $postObj->rejected_qty;
        $receipt->outstanding_qty   = $postObj->outstanding_qty;
        $receipt->short   			= $postObj->short;
        $receipt->remarks  		    = $postObj->remarks;
        $receipt->save(); 
        $this->save2ledger($postObj);
        return $receipt->id;
    }

    private function save2ledger($data)
    {
        $itemledger = new Itemledger;
        $itemledger-> = -($postObj->cust_code);
        $itemledger-> =  $postObj->client_code;
        $itemledger-> =  $postObj->location_code;
        $itemledger-> =  $postObj->item_code;
        $itemledger-> =  $postObj->qty;
        $itemledger-> =  $postObj->narration;
        $itemledger-> =  $postObj->status;
        $itemledger->save()
    }

    public function show($id)
    {
        $receipt = Inboundreceipt::find($id);
        return $receipt;
    }

    public function update($id)
    {
        $receipt = Inboundreceipt::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $receipt->client_code       = $postObj->client_code;
        $receipt->grn_date  		= $postObj->grn_date;
        $receipt->grn_no            = $postObj->grn_no;
        $receipt->po_no       		= $postObj->po_no;
        $receipt->invoice_no        = $postObj->invoice_no;
        $receipt->transport_mode    = $postObj->transport_mode;
        $receipt->forwarder_code    = $postObj->forwarder_code;
        $receipt->supplier_code     = $postObj->supplier_code;
        $receipt->rv_no  			= $postObj->rv_no;
        $receipt->product_no 		= $postObj->product_no;
        $receipt->expiry_date       = $postObj->expiry_date;
        $receipt->uom 				= $postObj->uom;
        $receipt->status      		= $postObj->status;
        $receipt->expected_qty   	= $postObj->expected_qty;
        $receipt->delivery_qty   	= $postObj->delivery_qty;
        $receipt->accepted_qty   	= $postObj->accepted_qty;
        $receipt->rejected_qty   	= $postObj->rejected_qty;
        $receipt->outstanding_qty   = $postObj->outstanding_qty;
        $receipt->short   			= $postObj->short;
        $receipt->remarks  		    = $postObj->remarks;
        $receipt->save(); 
        return $receipt->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Inboundreceipt::destroy($ids);
        return "true";
    }

    public function excelimport()
    {
        $file = Input::file('file');
        $excelarray = Excel::load($file)->toArray();
        $excelheader = array_shift($excelarray);
        $formatted_excel = [];
        foreach ($excelarray as $row=>$rval) {
            foreach ($rval as $cell=>$cellvalue) {
                $formatted_excel[$row][$excelheader[$cell]] = $cellvalue;
            }
        }
        $result = $this->save_xl_receipt($formatted_excel);
        #return Response::json('success','201'); 
        return $result;
    }

    private function save_xl_receipt($xl_array)
    {
        return print_r($xl_array, true);
    }
}