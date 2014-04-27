<?php

class LocationsAPIController extends \BaseController {

    //public $restful = true;
    /**
     * Display a listing of companies
     *
     * @return Response
     */
    public function index()
    {
        //$location_arr = Location::all()->toArray();
		Config::set('database.fetch', PDO::FETCH_ASSOC);
		$location_arr = DB::select('Select l.*, s.name as site_name from locations l INNER JOIN sites s ON s.id = l.warehouse_name'); 
        $location['page'] = 1;
        $location['total'] = 1;
        $location['records'] = count($location_arr);
        $location['rows'] = $location_arr;
        foreach ($location['rows'] as $key=>$value) {
            $location['rows'][$key]['select'] = "<input type='checkbox' id='{$value['id']}' class='locationbox' />";
        }
        return $location;
    }

    public function store()
    {
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $location = new Location;
        $location->location_no          = $postObj->location_no;
        $location->warehouse_name  		= $postObj->name;
        $location->location_area        = $postObj->location_area;
        $location->location_type       	= $postObj->location_type;
        $location->bin_number        	= $postObj->bin_number;
        $location->maximum_volume       = $postObj->maximum_volume;
        $location->minimum_volume   	= $postObj->minimum_volume;
        $location->location_condition  	= $postObj->location_condition;
        $location->location_indicator  	= $postObj->location_indicator;
        $location->save(); 
        return $location->id;
    }

    public function show($id)
    {
        $location = Location::find($id);
        return $location;
    }

    public function update($id)
    {
        $location = Location::find($id);
        $postData =  Input::get("data");
        $postObj = json_decode($postData);
        $location->location_no          = $postObj->location_no;
        $location->warehouse_name  		= $postObj->name;
        $location->location_area        = $postObj->location_area;
        $location->location_type       	= $postObj->location_type;
        $location->bin_number        	= $postObj->bin_number;
        $location->maximum_volume       = $postObj->maximum_volume;
        $location->minimum_volume   	= $postObj->minimum_volume;
        $location->location_condition  	= $postObj->location_condition;
        $location->location_indicator  	= $postObj->location_indicator;
        $location->save(); 
        return $location->id;
    }

    public function destroy($id)
    {
        $ids = explode(',',$id);
        Location::destroy($ids);
        return "true";
    }
}