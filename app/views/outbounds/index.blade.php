@extends('master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Outbound List</div>
		<div class="panel-body">
			<table id="locationList"></table>
			<div id="locationPager"></div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-default" data-toggle="modal" data-target="#addLocation">New Outbound</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Outbound</h4>
      </div>
        <form class="form-horizontal" role="form">
      <div class="modal-body">
      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Customer Po</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Consignee Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Forwarder code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Shipment type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Movement type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Details</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Discount price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product disc</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">UOM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Total Issue price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
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
	colNames:['Client Code','Order No', 'Order Date', 'Issue No', 'Issue Date', 'Customer Po', 'Consignee Code', 'Forwarder code', 'Shipment type', 'Movement type', 'Status','Details','Product No','Issue price','Discount price','Location No','Product disc','UOM','Order Qty','Issue Qty','Total Issue price','Qty'],
	colModel:[
		{name:'client_code'},
		{name:'order_no'},
		{name:'order_date'},
		{name:'issue_no'},
		{name:'issue_date'},
		{name:'customer_po'},
		{name:'consignee_code'},
		{name:'forwarder_code'},
		{name:'shipment_type'},
		{name:'movement_type'},
		{name:'status'},
		{name:'details'},
		{name:'product_no'},
		{name:'issue_price'},
		{name:'discount_price'},
		{name:'location_no'},
		{name:'product_disc'},
		{name:'uom'},
		{name:'order_qty'},
		{name:'issue_qty'},
		{name:'total_issue_price'},
		{name:'qty'},
	], 
	rowNum:10, 
	rowList:[10,20,30],
	pager: '#locationPager', 
	viewrecords: true, 
	sortorder: "desc", 
	loadonce: true
});
var mydata = [
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	{client_code:"2066",order_no:"1234",order_date:"00:00:0000 00:00",issue_no:"456",issue_date:"00:00:0000 00:00",customer_po:"1234",consignee_code:"1567",forwarder_code:"1678",shipment_type:"456",movement_type:"678",status:"Yes",details:"Sony",product_no:"1234",issue_price:"56007.50",discount_price:"450",location_no:"Chennai",product_disc:"Good Quality",uom:"1234",order_qty:"123",issue_qty:"456",total_issue_price:"6789",qty:"2345"},
	];
	for(var i=0;i<=mydata.length;i++)
		$("#locationList").addRowData(i+1,mydata[i]);

</script>
@stop