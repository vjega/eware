@extends('master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Product List</div>
		<div class="panel-body">
			<table id="productList"></table>
			<div id="productPager"></div>
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