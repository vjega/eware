@extends('master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Product List</div>
		<div class="panel-body">
			<table id="productList"></table>
			<div id="productPager"></div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-default" data-toggle="modal" data-target="#addProduct">New Product</button>
		</div>
	</div>
@stop

@section('popups')
<!-- add/Edit Products -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Products</h4>
      </div>
        <form class="form-horizontal" role="form">
      <div class="modal-body">
      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="4534" placeholder="0012">
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product  Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="00013289" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Name </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="Sumsung Monitors" placeholder="Product Name ">
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-12 control-label">Product description</label>
                        <div class="col-sm-12">
                            <textarea name="" id=""  rows="5" class="form-control">Samsung 17" Monitors, 24 cottons 
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Category</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="Monitors/Televisions" placeholder="Product Category">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">UOM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="numbers" placeholder="UOM">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Dimensions</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="" value="20x40x526" placeholder="Product Dimensions">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Serial Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="00000299930092" placeholder="Serial Number">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expiry date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="" value="03/12/2014" placeholder="Expiry date">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Storage Form</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>Solid</option>
                                <option>Hot</option>
                                <option>Cool</option>

                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Area</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="W23LC12" placeholder="Location Area">
                        </div>
                    </div>
                </div>
                
            </div>
                      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Product</button>
      </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('script')
<script>
var panelWidth = jQuery(".panel").width()-30;
jQuery("#productList").jqGrid({ 
	datatype: "local",
	height: 250,
	width: panelWidth,
	colNames:['Client Code','Product  Code', 'Product Name', 'Product description', 'Product Category', 'UOM', 'Product Dimensions', 'Serial Number', 'Expiry date', 'Storage Form', 'Location Area','Created Date'],
	colModel:[
		{name:'client_code'},
		{name:'product_code'},
		{name:'product_name'},
		{name:'product_desc'},
		{name:'product_cat'},
		{name:'uom'},
		{name:'product_dimensions'},
		{name:'serial_number'},
		{name:'expiry_date'},
		{name:'storage_form'},
		{name:'location_area'},
		{name:'created_at'}
	], 
	rowNum:10, 
	rowList:[10,20,30],
	pager: '#productPager', 
	viewrecords: true, 
	sortorder: "desc", 
	loadonce: true
});
var mydata = [
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	{client_code:"1005",product_code:"10456",product_name:"HP Pavilion 1000-1B02AU Laptop",product_desc:"14 inch Screen, AMD Dual Core Processor, 2 GB Memory, 320 GB HDD, Free DOS",product_cat:"Laptop",uom:"",product_dimensions:"1600 x 900",serial_number:"1000056",expiry_date:"2015-04-04",storage_form:"",location_area:"US",created_at:"2014-03-04"},
	
];
	for(var i=0;i<=mydata.length;i++)
		$("#productList").addRowData(i+1,mydata[i]);

</script>
@stop