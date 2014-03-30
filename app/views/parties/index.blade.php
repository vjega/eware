@extends('master')

<!-- Main Content -->
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h3>Parties</h3></div>
		<div class="panel-body">
			<table id="productList"></table>
			<div id="productPager"></div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-inverse" data-toggle="modal" data-target="#addParty">New Party</button>
		</div>
	</div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addParty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
<script>
var panelWidth = jQuery(".panel").width()-30;
jQuery("#productList").jqGrid({ 
	datatype: "local",
	height: 250,
	width: panelWidth,
	colNames:['Party Code','Party Name', 'Country', 'City', 'Address', 'Fax Number', 'Telephone Number', 'Postal Code', 'Contact Name', 'Credit Limit', 'Payment Terms', 'Business Hour', 'Party service Level', 'Order Priority', 'Services Provided', 'Created Date'],
	colModel:[
		{name:'username'},
		{name:'fname'},
		{name:'lname'},
		{name:'email'},
		{name:'warehouse'},
		{name:'status'},
		{name:'exp_on'},
		{name:'created_at'},
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
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"},
	{username:"Loram",fname:"Loram",lname:"Loram",email:"Loram",warehouse:"Loram",status:"Loram",exp_on:"Loram",created_at:"Loram"}
];
	for(var i=0;i<=mydata.length;i++)
		$("#productList").addRowData(i+1,mydata[i]);

</script>
@stop