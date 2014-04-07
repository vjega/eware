@extends('master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Sku List</div>
		<div class="panel-body">
			<table id="locationList"></table>
			<div id="locationPager"></div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-default" data-toggle="modal" data-target="#addLocation">New Location</button>
		</div>
	</div>
@stop

@section('popups')
<!-- add/Edit Products -->
<div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Sku</h4>
      </div>
        <form class="form-horizontal" role="form">
      <div class="modal-body">
      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location No </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Warehouse Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Area</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>Texas</option>
                                <option>Austn</option>
                                <option>Dallas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Type</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>Texas</option>
                                <option>Austn</option>
                                <option>Dallas</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Section</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>Texas</option>
                                <option>Austn</option>
                                <option>Dallas</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Bin Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="" >
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Maximum Volume</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Minimum Volume</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="" >
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location condition</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="" value="" >    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Indicator</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="" value="" >    
                        </div>
                    </div>
                </div>
				
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Currency</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>US</option>
                                <option>INR</option>
                                <option>EURO</option>
                            </select>
                        </div>
                    </div>
                </div>
			
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location cost</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                
            </div>
                      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Location</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('script')
<script>
var panelWidth = jQuery(".panel").width()-30;
jQuery("#locationList").jqGrid({ 
	datatype: "local",
	height: 250,
	width: panelWidth,
	colNames:['Location No','Warehouse Name', 'Location Area', 'Location Type', 'Location Section', 'Bin Number', 'Maximum Volume', 'Minimum Volume', 'Location Condition', 'Location Indicator', 'Currency','Location Cost'],
	colModel:[
		{name:'location_no'},
		{name:'warehouse_name'},
		{name:'location_area'},
		{name:'location_type'},
		{name:'location_section'},
		{name:'bin_number'},
		{name:'maximum_volume'},
		{name:'minimum_volume'},
		{name:'location_condition'},
		{name:'location_indicator'},
		{name:'currency'},
		{name:'location_cost'}
	], 
	rowNum:10, 
	rowList:[10,20,30],
	pager: '#locationPager', 
	viewrecords: true, 
	sortorder: "desc", 
	loadonce: true
});
var mydata = [
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"},
	{location_no:"2066",warehouse_name:"Brownwood",location_area:"Texas",location_type:"",location_section:"",bin_number:"34534",maximum_volume:"10000",minimum_volume:"100",location_condition:"",location_indicator:"",currency:"US",location_cost:"567.50"}	
];
	for(var i=0;i<=mydata.length;i++)
		$("#locationList").addRowData(i+1,mydata[i]);

</script>
@stop