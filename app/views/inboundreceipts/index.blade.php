@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Receipt</h3></div>
        <div class="panel-body">
            <table id="inboundReceiptsList"></table>
            <div id="inboundReceiptsPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New Receipt</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected Receipt</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected Receipt</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Receipt</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomfrm" id="adduomfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
						 <label for="" class="col-sm-4 control-label">Select</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="select" name="select" value="" placeholder="">
                        </div>
                    </div>
                </div>
                 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="client_code" name="client_code" value="" placeholder="Client Code">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Grn Date</label>
                        <div class="col-sm-8">
							<input type="text" class="form-control" id="grn_date" name="grn_date" value="" placeholder="Grn Date">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Grn No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="grn_no" name="grn_no" value="" placeholder="Grn No">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Po No</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="po_no" name="po_no" value="" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Invoice No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="invoice_no" value="" name="invoice_no" placeholder="Invoice No">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Transport Mode</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="transport_mode" value="" name="transport_mode" placeholder="">    
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
                        <label for="" class="col-sm-4 control-label">Supplier Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="supplier_code" value="" name="supplier_code" placeholder="Supplier Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Rv No</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="rv_no" value="" name="rv_no" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product No</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_no" value="" name="product_no" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expiry Date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="expiry_date" value="" name="expiry_date" placeholder="Expiry Date">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Uom</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="uom" value="" name="uom" placeholder="Uom">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Status</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="status" value="" name="status" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expected Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="expected_qty" value="" name="expected_qty" placeholder="Expected Qty">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Delivery Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="delivery_qty" value="" name="delivery_qty" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Accepted Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="accepted_qty" value="" name="accepted_qty" placeholder="Accepted Qty">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Rejected Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="rejected_qty" value="" name="rejected_qty" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Outstanding Qty</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="outstanding_qty" value="" name="outstanding_qty" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Short</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="short" value="" name="short" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Remarks</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="remarks" value="" name="remarks" placeholder="">    
                        </div>
                    </div>
                </div>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-uom">Save Uom</button>
        <button type="button" class="btn btn-primary" id="post-uom">Update Uom</button>
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
jQuery("#inboundReceiptsList").jqGrid({ 
    url:'api/v1/inboundreceipts',
    datatype: "json",
    height: 375,
    width: panelWidth,
	colNames:['<input type="checkbox"/>','Client Code','Grn Date','Grn No','PO No','Invoice No','Transport Mode','Forwarder Code','Supplier Code','RV NO','Product no','Expiry Date','UOM','Status','Expected Qty','Delivery Qty','Accepted Qty','Rejected Qty','Outstanding Qty','Short','Remarks' ],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'grn_date'},
		{name:'grn_no'},
		{name:'po_no'},
		{name:'invoice_no'},
		{name:'transport_mode'},
		{name:'forwarder_code'},
		{name:'supplier_code'},
		{name:'rv_no'},
		{name:'product_no'},
		{name:'expiry_date'},
		{name:'uom'},
		{name:'status'},
		{name:'expected_qty'},
		{name:'delivery_qty'},
		{name:'accepted_qty'},
		{name:'rejected_qty'},
		{name:'outstanding_qty'},
		{name:'short'},
		{name:'remarks'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#reasonCodePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_uom = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#adduomfrm")},
        url: "api/v1/uoms",
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
        url: "api/v1/uoms/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }							
    });
    
};

var del_uom = function() {
    var checkboxes = [];
    $("input.uombox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/uoms/"+checkboxes.join(','),
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
    var reclen = $("input.uombox:checked").length;
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
        url: "api/v1/uoms/"+$("input.uombox:checked").prop('id'),
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