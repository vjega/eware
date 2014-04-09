@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Stock Take - Cycle Count</h3></div>
        <div class="panel-body">
            <table id="stockTakeList"></table>
            <div id="stockTakePager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New Stock</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected Stock</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected Stock</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Stock Take</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomfrm" id="adduomfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="client_code" name="client_code" value="" placeholder="Client Code">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Cycle Count Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" id="cycle_count_date" name="cycle_count_date" value="" placeholder="Cycle Count Date">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Reference No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="reference_no" name="reference_no" value="" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Cycle Count No</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="cycle_count_no" name="cycle_count_no" value="" placeholder="">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="status" name="status" value="" placeholder="Status">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Remarks</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="remarks" name="remarks" value="" placeholder="Remarks">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Stock</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="stock" name="stock" value="" placeholder="Stock">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Mark</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mark" name="mark" value="" placeholder="Mark">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Confirm Cycle Count</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="confirm_cycle_count" name="confirm_cycle_count" value="" placeholder="Confirm Cycle Count">
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
jQuery("#stockTakeList").jqGrid({ 
    url:'api/v1/stocktakes',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Client Code','Cycle count Date','Reference No','Cycle count No','Status','Remarks','Stock','Mark','Confirm Cycle Count'],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'cycle_count_date'},
		{name:'reference_no'},
		{name:'cycle_count_no'},
		{name:'status'},
		{name:'remarks'},
		{name:'stock'},
		{name:'mark'},
		{name:'confirm_cycle_count'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#stockTakePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_uom = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#adduomfrm")},
        url: "api/v1/stocktakes",
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
        url: "api/v1/stocktakes/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }
    });
    
};

var del_uom = function() {
    var checkboxes = [];
    $("input.stockbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/stocktakes/"+checkboxes.join(','),
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
    var reclen = $("input.stockbox:checked").length;
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
        url: "api/v1/stocktakes/"+$("input.stockbox:checked").prop('id'),
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