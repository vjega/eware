<?php

class SkuproductsAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        /** We use the same route to query and filter the SKU products based on the query string
        * right now it is only for client code
        * Later we will find a generic query to use this
        */
        $clientcode = Input::get('client_code', ''); 
        if ($clientcode) {
            return Skuproduct::where('client_code', '=', $clientcode)->get();
        }
        $productcode = Input::get('product_code', '');
        if ($productcode) {
            return Skuproduct::where('id', '=', $productcode)->get();
        }
        $skuprods_arr = Skuproduct::all()->toArray();
        $skuprod['page'] = 1;
        $skuprod['total'] = 1;
        $skuprod['records'] = count($skuprods_arr);
        $skuprod['rows'] = $skuprods_arr;
        foreach ($skuprod['rows'] as $key=>$value) {
            $skuprod['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='prdbox' />";
        }
        return $skuprod;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $product = new Skuproduct;
        $product->client_code =     $postObj->client_code;
        $product->product_code =    $postObj->product_code;
        $product->product_name =    $postObj->product_name;
        $product->description =     $postObj->description;
        $product->product_category =    $postObj->product_category;
        $product->quantity =        $postObj->quantity;
        $product->uom_id =          $postObj->uom_id;
        $product->product_dimensions =  $postObj->product_dimensions;
        $product->serial_number =   $postObj->serial_number;
        $product->expiry_date =     $postObj->expiry_date;
        $product->storage_form =    $postObj->storage_form;
        $product->location_area =   $postObj->location_area;
        $product->save();
        $itemledger = new Itemledger;
        $itemledger->cust_code   = $postObj->client_code;
        $itemledger->location_code = $postObj->location_area;
        $itemledger->item_code     = $postObj->product_code;
        $itemledger->ref_no        = "";
        $itemledger->qty           = $postObj->quantity;
        $itemledger->narration     = "SKU-ENTRY";
        $itemledger->status        = "1";
        $itemledger->save();
        return $product->id;
    }

    public function show($id)
    {
       $product = Skuproduct::find($id);
        return $product;
    }

    public function update($id)
    {
        $product = Skuproduct::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $product->client_code 		= $postObj->client_code;
        $product->product_code		= $postObj->product_code;
        $product->product_name 		= $postObj->product_name;
        $product->description 		= $postObj->description;
        $product->product_category  = $postObj->product_category;
        $product->quantity 			= $postObj->quantity;
        $product->uom_id 			= $postObj->uom_id;
        $product->product_dimensions =$postObj->product_dimensions;
        $product->serial_number 	= $postObj->serial_number;
        $product->expiry_date 		= $postObj->expiry_date;
        $product->storage_form	    = $postObj->storage_form;
        $product->location_area     = $postObj->location_area;
       
        $product->save(); 
        return $product->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Skuproduct::destroy($ids);
        return "true";
    }

    /**
     * [excelimport description]
     * @return [type] [description]
     */
    
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
        $this->save_skudata($formatted_excel);
        return Response::json('sucess','201'); 
    }

    private function save_skudata($formatted_excel)
    {
        foreach ($formatted_excel as $row => $postObj) {
            $product = new Skuproduct;
            $product->client_code        = isset($postObj['client_code'])        ? $postObj['client_code'] : '';
            $product->product_code       = isset($postObj['product_code'])       ? $postObj['product_code'] : '';
            $product->product_name       = isset($postObj['product_name'])       ? $postObj['product_name'] : '';
            $product->description        = isset($postObj['description'])        ? $postObj['description'] : '';
            $product->product_category   = isset($postObj['product_category'])   ? $postObj['product_category'] : '';
            $product->uom_id             = isset($postObj['uom_id'])             ? $postObj['uom_id'] : '';
            $product->quantity           = isset($postObj['quantity'])           ? $postObj['quantity'] : '0';
            $product->product_dimensions = isset($postObj['product_dimensions']) ? $postObj['product_dimensions'] : '';
            $product->serial_number      = isset($postObj['serial_number'])      ? $postObj['serial_number'] : '';
            $product->expiry_date        = isset($postObj['expiry_date'])        ? $postObj['expiry_date'] : '0000-00-00';
            $product->storage_form       = isset($postObj['storage_form'])       ? $postObj['storage_form'] : '';
            $product->location_area      = isset($postObj['location_area'])      ? $postObj['location_area'] : '';
            $product->save();
            $this->save_sku_extra($postObj);
        }
    }

    private function save_sku_extra($sku_extra)
    {
            $sku_code = $sku_extra['product_code'];
            $normalfield = ['client_code','product_code',
                'product_name', 'description',
                'product_category','uom_id', 
                'quantity','product_dimensions', 
                'serial_number','expiry_date', 
                'storage_form','location_area'
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