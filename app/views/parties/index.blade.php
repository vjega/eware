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
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Party/Business</h4>
      </div>
        <form class="form-horizontal" role="form">
      <div class="modal-body">      
            

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Party  Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="00013289" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Party Name </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="Sumsung" placeholder="Product Name ">
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
@stop


<!-- Page based Scripts -->
@section('script')
<script>
var panelWidth = jQuery(".panel").width()-30;
jQuery("#productList").jqGrid({ 
	datatype: "local",
	height: 375,
	width: panelWidth,
	colNames:['Party Code','Party Name', 'Country', 'City', 'Address', 'Fax Number', 'Telephone Number', 'Postal Code', 'Contact Name', 'Credit Limit', 'Payment Terms', 'Business Hour', 'Party service Level', 'Order Priority', 'Services Provided', 'Created Date'],
	colModel:[
		{name:'party_code'},
		{name:'party_name'},
		{name:'country'},
		{name:'city'},
		{name:'address'},
		{name:'fax_number'},
		{name:'telephone_number'},
		{name:'postal_code'},
		{name:'contact_name'},
		{name:'credit_limit'},
		{name:'payment_terms'},
		{name:'business_hour'},
		{name:'party_service_level'},
		{name:'order_priority'},
		{name:'services_provided'},
		{name:'created_date'}
	], 
	rowNum:10, 
	rowList:[10,20,30], 
	pager: '#productPager', 
	viewrecords: true, 
	sortorder: "desc", 
	loadonce: true
});
var mydata = [
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
	{party_code:"8748",party_name:"Reliance",country:"india",city:"ludhiana",address:"#3324, nehru street",fax_number:"022-6374858",telephone_number:"022-6474533",postal_code:"1000435",contact_name:"John chinathambi",credit_limit:"70000000",payment_terms:"never pay",business_hour:"22:00 - 2:00 UTC",party_service_level:"Low",order_priority:"Very Low",services_provided:"Forwared",created_date:"00-00-0000 00:00"},
];
	for(var i=0;i<=mydata.length;i++)
		$("#productList").addRowData(i+1,mydata[i]);

</script>
@stop