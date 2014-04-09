@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>SKU Product Master</h3></div>
        <div class="panel-body">
            <table id="skuProductList"></table>
            <div id="skuProductPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showProductPop">New SKU Product</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editProductPop">Edit Selected SKU Product</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delProduct">Delete Selected SKU Product</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Products</h4>
      </div>
      <form class="form-horizontal" role="form" name="addProductfrm" id="addProductfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="client_code" name="client_code" value="" placeholder="Enter Client Code e.g. ACMC">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product code </label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="product_code" name="product_code" value="" placeholder="Nokia 23421">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="product_name" name="product_name" value="" placeholder="Nokia 2332">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    
                </div>
                
            </div>
           
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" placeholder="Something about product"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product category</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="product_category" name="product_category" value="" placeholder="like TV/Monitors">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Quantity</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="quantity" value="" name="quantity" placeholder="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">UOM id</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="uom_id" value="" name="uom_id" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product dimensions</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="product_dimensions" value="" name="product_dimensions" placeholder="W x H x B">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Serial number</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="serial_number" value="" name="serial_number" placeholder="ispn number">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expiry date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control  datepicker " id="expiry_date" value="" name="expiry_date" placeholder="Date">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Storage form</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="storage_form" value="" name="storage_form" placeholder="H0t/cold/warm">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">location_area</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="location_area" value="" name="location_area" placeholder="w1lc3">  
                        </div>
                    </div>
                </div>
            </div>
           
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_product">Save Company</button>
        <button type="button" class="btn btn-primary" id="post_product">Update Company</button>
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
	$(".datepicker").datepicker();
	
    $("#save_product").click(function(){
        save_product();
    });
    $("#showProductPop").click(function(){
        show_add_modal();
    });
    $("#editProductPop").click(function(){
        show_edit_modal();
    });
    $("#delProduct").click(function(){
        del_product();
    });
    $("#post_product").click(function(){
        update_product();
    });
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#skuProductList").jqGrid({ 
    url:'api/v1/skuproducts',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Client Code', 'Product Code', 'Product Name', 'Product description', 'Product Category', 'Quantity', 'UOM', 'Product Dimensions', 'Serial Number', 'Expiry date', 'Storage Form', 'Location Area'],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'product_code'},
		{name:'product_name'},
		{name:'description'},
		{name:'product_category'},
		{name:'quantity'},
		{name:'uom_id'},
		{name:'product_dimensions'},
		{name:'serial_number'},
		{name:'expiry_date'},
		{name:'storage_form'},
		{name:'location_area'},
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#skuProductPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_product = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addProductfrm")},
        url: "api/v1/skuproducts",
    }).done(function(data){
        if(data) {
            $('#addProduct').modal('hide');
            location.reload();
        }
    });
    
};

var update_product = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addProductfrm") },
        url: "api/v1/skuproducts/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addProduct').modal('hide');
            location.reload();
        }
    });
    
};

var del_product = function() {
    var checkboxes = [];
    $("input.prdbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/skuproducts/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post_product").hide();
    $("#save_product").show();
    $('#addProductfrm').each(function() {
        this.reset();
    });
    $('#addProduct').modal('show');
}

var show_edit_modal = function () {
    $("#save_product").hide();
    $("#post_product").show();
    var reclen = $("input.prdbox:checked").length;
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
        url: "api/v1/skuproducts/"+$("input.prdbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addProduct').modal('show');
    });
}

</script>
@stop