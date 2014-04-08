@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Issue</h3></div>
        <div class="panel-body">
            <table id="outboundIssueList"></table>
            <div id="outboundIssuePager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New Outbound Issue</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected Outbound Issue</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected Outbound Issue</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addUom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Outbound Issue</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomfrm" id="adduomfrm">
      <div class="modal-body">      
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <input type="text" class="form-control" id="client_code" name="client_code" value="" placeholder="Enter Uom Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="order_no" name="order_no" value="" placeholder="Enter Uom Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                
            </div>
          
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order Date</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="order_date" name="order_date" value="" placeholder="Enter Fax Number">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="issue_no" value="" name="issue_no" placeholder="Enter Issue No">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue Date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="issue_date" value="" name="issue_date" placeholder="Enter Issue Date">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Customer Po</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="customer_po" value="" name="customer_po" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Consignee Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="consignee_code" value="" name="consignee_code" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Forwarder Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="forwarder_code" value="" name="forwarder_code" placeholder="">  

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Shipment Type</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="shipment_type" value="" name="shipment_type" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Movement Type</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="movement_type" value="" name="movement_type" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="status" value="" name="status" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Details</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="details" value="" name="details" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product No</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_no" value="" name="product_no" placeholder="Enter Product No">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue Price</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="issue_price" value="" name="issue_price" placeholder="Enter Issue Price">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Discount Price</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="discount_price" value="" name="discount_price" placeholder="Enter Discount Price">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location No</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="location_no" value="" name="location_no" placeholder="Enter Location No">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Disc</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_disc" value="" name="product_disc" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Uom</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="uom" value="" name="uom" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="order_qty" value="" name="order_qty" placeholder="Enter Order Qty">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Issue Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="issue_qty" value="" name="issue_qty" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Total Issue Price</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="total_issue_price" value="" name="total_issue_price" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="location_qty" value="" name="location_qty" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
		</div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-uom">Save Issue</button>
        <button type="button" class="btn btn-primary" id="post-uom">Update Issue</button>
      </div>
    </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
<script>

var serilaizeJson =  function (form, stripfromAttr){
    var unindexed_array = $(form).serializeArray();
    unindexed_array = unindexed_array.concat(
        $(form+' input[type=checkbox]').map(function() {
            return {"name": this.name, "value": ($(this).prop("checked") ? 1 : 0 ) }
        }).get()
    );
    var indexed_array = {};
    $.map(unindexed_array, function(n, i){
        if (typeof(stripfromAttr)==="undefined")
            indexed_array[n['name']] = n['value'];
        else 
            indexed_array[n['name'].replace(stripfromAttr, '')] = n['value'];
    });

    return JSON.stringify(indexed_array);
}

$(document).ready(function(){
    $("#save-uom").click(function(){
        save_uom();
    });
    $("#showUomPop").click(function(){
        show_add_modal();
    });
    $("#editUomPop").click(function(){
        show_edit_modal();
    });
    $("#delUom").click(function(){
        del_uom();
    });
    $("#post-uom").click(function(){
        update_uom();
    });
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#outboundIssueList").jqGrid({ 
    url:'api/v1/outboundissues',
    datatype: "json",
    height: 375,
    width: panelWidth,
	colNames:['<input type="checkbox"/>','Client Code','Order No','Order Date','Issue No','Issue Date','Customer Po','Consignee Code','Forwarder code','Shipment type','Movement type','Status','Details','Product No','Issue price','Discount price','Location No','Product disc','UOM','Order Qty','Issue Qty','Total Issue price','Location Qty'],
    colModel:[
        {name:'select'},
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
		{name:'location_qty'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#outboundIssuePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_uom = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#adduomfrm")},
        url: "api/v1/outboundissues",
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }
    });
    
};

var update_uom = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#adduomfrm") },
        url: "api/v1/outboundissues/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }							
    });
    
};

var del_uom = function() {
    var checkboxes = [];
    $("input.enquissubox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/outboundissues/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-uom").hide();
    $("#save-uom").show();
    $('#adduomfrm').each(function() {
        this.reset();
    });
    $('#addUom').modal('show');
}

var show_edit_modal = function () {
    $("#save-uom").hide();
    $("#post-uom").show();
    var reclen = $("input.enquissubox:checked").length;
    if (reclen === 0) {
        alert("Please Select an entry to edit");
        return false;
    }
    if (reclen > 1) {
        alert("Please edit one record at a time");
        return false;
    }
    $.ajax({
        type: "GET",
        url: "api/v1/outboundissues/"+$("input.enquissubox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addUom').modal('show');
    });
}

</script>
@stop	