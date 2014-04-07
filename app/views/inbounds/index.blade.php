@extends('master')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Inbound List</div>
		<div class="panel-body">
			<table id="locationList"></table>
			<div id="locationPager"></div>
		</div>
		<div class="panel-footer">
			<button class="btn btn-default" data-toggle="modal" data-target="#addLocation">New Inbound</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Inbound</h4>
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
                        <label for="" class="col-sm-4 control-label">Grn Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Grn No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">PO No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Invoice No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Transport Mode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Forwarder Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Supplier Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">RV NO</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Receipt Voucher No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Remarks</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expiry Date</label>
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
                        <label for="" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expected Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Delivery Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Accepted Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Rejected Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Outstanding Qty</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-12 control-label">Remarks</label>
                        <div class="col-sm-12">
                            <textarea name="" id=""  rows="5" class="form-control"> 
                            </textarea>
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
	colNames:['Client Code','Grn Date', 'Grn No', 'PO No', 'Invoice No', 'Transport Mode', 'Forwarder Code', 'Supplier Code', 'RV NO', 'Receipt Voucher No', 'Remarks','Product Code','Expiry Date','UOM','Status','Expected Qty','Delivery Qty','Accepted Qty','Rejected Qty','Outstanding Qty','Remarks'],
	colModel:[
		{name:'client_code'},
		{name:'grn_date'},
		{name:'grn_no'},
		{name:'po_no'},
		{name:'invoice_no'},
		{name:'transport_mode'},
		{name:'forwarder_code'},
		{name:'supplier_code'},
		{name:'rv_no'},
		{name:'receipt_voucher_no'},
		{name:'remarks'},
		{name:'product_code'},
		{name:'expiry_date'},
		{name:'uom'},
		{name:'status'},
		{name:'expected_qty'},
		{name:'delivery_qty'},
		{name:'accepted_qty'},
		{name:'rejected_qty'},
		{name:'outstanding_qty'},
		{name:'remarks'},
	], 
	rowNum:10, 
	rowList:[10,20,30],
	pager: '#locationPager', 
	viewrecords: true, 
	sortorder: "desc", 
	loadonce: true
});
var mydata = [
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	{client_code:"2066",grn_date:"00:00:0000 00:00",grn_no:"123",po_no:"123",invoice_no:"1234",transport_mode:"yes",forwarder_code:"10000",supplier_code:"100",rv_no:"456",receipt_voucher_no:"678",remarks:"Good Quality",product_code:"Sony",expiry_date:"00:00:0000 00:00",uom:"567.50",status:"No",expected_qty:"567.50",delivery_qty:"567.50",accepted_qty:"567.50",rejected_qty:"567.50",outstanding_qty:"567.50",remarks:"Sony Product"},
	];
	for(var i=0;i<=mydata.length;i++)
		$("#locationList").addRowData(i+1,mydata[i]);

</script>
@stop