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
        #$receipt->transport_mode    = $postObj->transport_mode;
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
        $itemledger->qty             = $data->accepted_qty;
        $itemledger->cust_code       = $data->client_code;
        $itemledger->location_code	 = $data->location_code;
        $itemledger->item_code       = $data->product_no;
        $itemledger->ref_no          = $data->grn_no;
        $itemledger->narration       = "INBOUND";
        $itemledger->status		     =  "";
        $itemledger->save();
		return $itemledger;
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

    private function save_xl_receipt($formatted_excel)
    {
		foreach ($formatted_excel as $row => $postObj) {
            $receipt = new Skuproduct;
            $receipt->client_code        = isset($postObj['client_code']) 	? $postObj['client_code'] : '';
            $receipt->grn_date       	 = isset($postObj['grn_date'])     	? $postObj['grn_date'] : '0000-00-00';
            $receipt->grn_no       		 = isset($postObj['grn_no'])      	 ? $postObj['grn_no'] : '';
            $receipt->po_no        		 = isset($postObj['po_no'])       	 ? $postObj['po_no'] : '';
            $receipt->invoice_no   		 = isset($postObj['invoice_no'])  	 ? $postObj['invoice_no'] : '';
            $receipt->transport_mode     = isset($postObj['transport_mode']) ? $postObj['transport_mode'] : '';
            $receipt->forwarder_code     = isset($postObj['forwarder_code'])  ? $postObj['forwarder_code'] : '';
            $receipt->supplier_code 	 = isset($postObj['supplier_code'])   ? $postObj['supplier_code'] : '';
            $receipt->rv_no      	     = isset($postObj['rv_no']) 		  ? $postObj['rv_no'] : '';
            $receipt->product_no         = isset($postObj['product_no']) 	  ? $postObj['product_no'] : '0';
            $receipt->expiry_date        = isset($postObj['expiry_date']) 	  ? $postObj['expiry_date'] : '0000-00-00';
            $receipt->uom      			 = isset($postObj['uom']) 			  ? $postObj['uom'] : '';
            $receipt->status      		 = isset($postObj['status']) 		  ? $postObj['status'] : '';
            $receipt->expected_qty       = isset($postObj['expected_qty'])    ? $postObj['expected_qty'] : '0';
            $receipt->delivery_qty       = isset($postObj['delivery_qty'])    ? $postObj['delivery_qty'] : '0';
            $receipt->accepted_qty       = isset($postObj['accepted_qty'])    ? $postObj['accepted_qty'] : '0';
            $receipt->rejected_qty       = isset($postObj['rejected_qty'])    ? $postObj['rejected_qty'] : '0';
            $receipt->outstanding_qty    = isset($postObj['outstanding_qty']) ? $postObj['outstanding_qty'] : '0';
            $receipt->short     		 = isset($postObj['short']) 		  ? $postObj['short'] : '';
            $receipt->remarks     		 = isset($postObj['remarks']) 	      ? $postObj['remarks'] : '';
            $receipt->save();
            $this->save_sku_extra($postObj);
        }
    }
	
	private function save_sku_extra($sku_extra)
    {
            $sku_code = $sku_extra['po_no'];
            $normalfield = ['client_code','grn_date',
                'grn_no', 'po_no',
                'invoice_no','transport_mode', 
                'forwarder_code','supplier_code', 
                'rv_no','product_no', 
                'expiry_date','uom','status',
				'expected_qty','delivery_qty',
				'accepted_qty','rejected_qty',
				'outstanding_qty','short','remarks'
            ];
            foreach ($sku_extra as $key=>$val) {
                if (!in_array($key, $normalfield) && $val) {

                    $skue = new Skuextra;
                    $skue->skucode = $sku_code;
                    $skue->attribute = $key;
                    $skue->value = $val;
                    $skue->save();
                }
            }
    }
}