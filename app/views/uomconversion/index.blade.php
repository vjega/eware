@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>UOM Conversion Master</h3></div>
        <div class="panel-body">
            <table id="uomConversionList"></table>
            <div id="uomConversionPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New UOM Conversion</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected UOM Conversion</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected UOM Conversion</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Uom Conversion Master</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomfrm" id="adduomfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
							<input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="email" class="form-control" id="client_code" name="client_code" value="" placeholder="Client Code">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="product_number" value="" name="product_number" placeholder="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">From Uom</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="from_uom" value="" name="from_uom" placeholder="">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Conversion Rate</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="conversion_rate" value="" name="conversion_rate" placeholder="Conversion Rate">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">To Uom</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="to_uom" value="" name="to_uom" placeholder="">    
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

var panelWidth = jQuery(".panel").width()-30;
jQuery("#uomConversionList").jqGrid({ 
    url:'api/v1/uomconversion',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>',
                'Client Code',
				'Product Number',
				'From UOM',
				'Conversion Rate',
				'To UOM'
            ],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'product_number'},
		{name:'from_uom'},
		{name:'conversion_rate'},
		{name:'to_uom'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#uomConversionPager', 
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