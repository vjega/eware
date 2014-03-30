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
jQuery("#productList").jqGrid({ 
	datatype: "local",
	height: 250,
	width: 950,
	colNames:['Username','First Name', 'Last Name', 'Email ID', 'Warehouse Name', 'Status', 'Expiry Date', 'Created Date'],
	colModel:[
		{name:'username'},
		{name:'fname'},
		{name:'lname'},
		{name:'email'},
		{name:'warehouse'},
		{name:'status'},
		{name:'exp_on'},
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
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
	{username:"shahul",fname:"Shahul",lname:"Hameed",email:"shameed.pro@gmail.com",warehouse:"Loram Ipsam",status:"Active",exp_on:"2015-04-04",created_at:"2014-03-04"},
];
	for(var i=0;i<=mydata.length;i++)
		$("#productList").addRowData(i+1,mydata[i]);

</script>
@stop