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
        $product->client_code =$postObj->client_code;
        $product->product_code =        $postObj->product_code;
        $product->product_name =        $postObj->product_name;
        $product->description =        $postObj->description;
        $product->product_category =        $postObj->product_category;
        $product->quantity =        $postObj->quantity;
        $product->uom_id =        $postObj->uom_id;
        $product->product_dimensions =        $postObj->product_dimensions;
        $product->serial_number =        $postObj->serial_number;
        $product->expiry_date =        $postObj->expiry_date;
        $product->storage_form =        $postObj->storage_form;
        $product->location_area =        $postObj->location_area;
       
        $product->save(); 
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
       $product->client_code =$postObj->client_code;
        $product->product_code =        $postObj->product_code;
        $product->product_name =        $postObj->product_name;
        $product->description =        $postObj->description;
        $product->product_category =        $postObj->product_category;
        $product->quantity =        $postObj->quantity;
        $product->uom_id =        $postObj->uom_id;
        $product->product_dimensions =        $postObj->product_dimensions;
        $product->serial_number =        $postObj->serial_number;
        $product->expiry_date =        $postObj->expiry_date;
        $product->storage_form =        $postObj->storage_form;
        $product->location_area =        $postObj->location_area;
       
        $product->save(); 
        return $product->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Skuproduct::destroy($ids);
        return "true";
    }
}