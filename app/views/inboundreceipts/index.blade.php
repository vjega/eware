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
            <button class="btn btn-inverse" data-toggle="modal" id="impXl">Import From Exel</button>
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
                        <label for="" class="col-sm-4 control-label">Client Code
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                           <select name="client_code" id="client_code" class="form-control validate[required]">
								<option value="">Select Client Code</option>
                                @foreach ($clients as $cli)
                                <option value="{{$cli->client_code}}">{{$cli->client_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Grn Date
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
							<input type="text" class="form-control datepicker validate[required]" id="grn_date" name="grn_date" value="" placeholder="Grn Date">
                        </div>
						
					</div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Grn No
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required]" id="grn_no" name="grn_no" value="" placeholder="Grn No">
                        </div>
                    </div>
                </div>
				 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Po No</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="po_no" name="po_no" value="" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Invoice No
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required]" id="invoice_no" value="" name="invoice_no" placeholder="Invoice No">
                        </div>
                    </div>
                </div>
				 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Code</label>
                        <div class="col-sm-8">
                        <select type="text" class="form-control" id="location_code" value="" name="location_code" placeholder="">    
                            @foreach($locs as $loc)
                            <option value="{{$loc->location_no}}">{{$loc->warehouse_name}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Forwarder Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="forwarder_code" value="" name="forwarder_code" placeholder="">  
                        </div>
                    </div>
                </div>
				 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Supplier Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="supplier_code" value="" name="supplier_code" placeholder="Supplier Code">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Rv No
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control validate[required]" id="rv_no" value="" name="rv_no" placeholder="">  
                        </div>
                    </div>
                </div>
				 <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product No</label>
                        <div class="col-sm-8">
                        <select class="form-control" id="product_no"  name="product_no">    
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Name
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control validate[required]" id="product_name" value="" name="product_name" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expiry Date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control datepicker" id="expiry_date" value="" name="expiry_date" placeholder="Expiry Date"> <span class="add-on"><i class="icon-th"></i></span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Uom</label>
                        <div class="col-sm-8">
                        <select type="text" class="form-control" id="uom" value="" name="uom" placeholder="Uom">    
                            <option value="">Select UOM Code</option>
                                @foreach ($uoms as $uom)
                                <option value="{{$uom->uom_code}}">{{$uom->uom_code}}</option>
                                @endforeach
                        </select>
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
                        <label for="" class="col-sm-4 control-label">Accepted Qty
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control validate[required]" id="accepted_qty" value="" name="accepted_qty" placeholder="Accepted Qty">    
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
        <button type="button" class="btn btn-primary" id="save-uom">Save Receipt</button>
        <button type="button" class="btn btn-primary" id="post-uom">Update Receipt</button>
      </div>
    </div>
</div>
</div>
<div class="modal fade" id="impExlModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Import from excel</h4>
      </div>
      <div class="modal-body">      
         <div class="modal-body" id="dropzone">
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="browse_excel">Browse and Upload File</button>
      </div>
    </div>
</div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
<style>
.datepicker{z-index:1561!important;}
</style>
<script>

/**
 * Creating a WMS Namespace
 * @type {[type]}
 */
window.WMS = window.WMS || {};
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

	$(".datepicker").datepicker({
		format: 'yyyy-mm-dd'

	});
    
    myDropzone = $("#dropzone").dropzone({
        url :'upload/receiptxlsimport',
        clickable : '#browse_excel',
        complete : function(file) {
            $("#importModal").modal('hide');
            //document.location.reload();
        }
    });

    $("#product_no").change(function(){
        for (var idx in WMS.sku) {
            if (WMS.sku[idx].id == $(this).val()) {
                $("#product_name").val(WMS.sku[idx].product_name);
                break;
            }
        }
    });
    $("#impXl").click(function(){
        $("#impExlModal").modal("show");
    })
    $("#client_code").change(function(){
        update_product_dropdown(this);
    })

    // $(".datepicker").datepicker();
	
    $("#save-uom").click(function(){
		if (($("#adduomfrm").validationEngine("validate"))===true) {
			save_uom();
		}
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
    pager: '#inboundReceiptsPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_uom = function() {
	$.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#adduomfrm")},
        url: "api/v1/inboundreceipts",
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
        url: "api/v1/inboundreceipts/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }							
    });
    
};

var del_uom = function() {
    var checkboxes = [];
    $("input.receiptybox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/inboundreceipts/"+checkboxes.join(','),
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
    var reclen = $("input.receiptybox:checked").length;
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
        url: "api/v1/inboundreceipts/"+$("input.receiptybox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addUom').modal('show');
    });
}

var update_product_dropdown = function (elm) {
	$.ajax({
        url:"api/v1/skuproductsall?client_code="+$(elm).val(),
        method:"GET"
    })
    .done(function(data) {
        WMS.sku = data
		var optList = "";
        for(var d in data) {
           	optList += "<option value='"+data[d].id+"'>"+data[d].product_code+"</option>";
        }
        $("#product_no").html(optList);
		$("#product_name").val(data[0].product_name);
		
    })
    .fail(function() {
        console.log( "error" );
    });
}
</script>
@stop	