@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Reason Code Master</h3></div>
        <div class="panel-body">
            <table id="reasonCodeList"></table>
            <div id="reasonCodePager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showReasonCodePop">New Reason Code</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editReasonCodePop">Edit Selected Reason Code</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delReasonCode">Delete Selected Reason Code</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addReasonCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Reason Code</h4>
      </div>
      <form class="form-horizontal" role="form" name="addreasoncodefrm" id="addreasoncodefrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Reason Code
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control validate[required,minSize[6]. maxSize[12]]" id="reason_code" name="reason_code" value="" placeholder="Enter Reason Code.">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Reason Type</label>
                        <div class="col-sm-8">
							<input type="text" class="form-control" id="reason_type" name="reason_type" value="" placeholder="Enter Reason Type.">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Description
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control validate[required,minSize[6]. maxSize[12]]" id="description" name="description" value="" placeholder="Enter Description .">
                        </div>
                    </div>
                </div>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-reason-code">Save Reason Code</button>
        <button type="button" class="btn btn-primary" id="post-reason-code">Update Reason Code</button>
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
    $("#save-reason-code").click(function(){
		if (($("#addreasoncodefrm").validationEngine("validate"))===true) {
			  save_reason_code();
		}
    });
    $("#showReasonCodePop").click(function(){
        show_add_modal();
    });
    $("#editReasonCodePop").click(function(){
        show_edit_modal();
    });
    $("#delReasonCode").click(function(){
        del_reason_code();
    });
    $("#post-reason-code").click(function(){
        update_reason_code();
    });
});

var panelWidth = jQuery(".panel").width()-30;
jQuery("#reasonCodeList").jqGrid({ 
    url:'api/v1/reasoncodes',
    datatype: "json",
    height: 375,
    width: panelWidth,
	colNames:['<input type="checkbox"/>','Reason Code','Reason type','Description'],
    colModel:[
        {name:'select'},
		{name:'reason_code'},
		{name:'reason_type'},
		{name:'description'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#reasonCodePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_reason_code = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addreasoncodefrm")},
        url: "api/v1/reasoncodes",
    }).done(function(data){
        if(data) {
            $('#addReasonCode').modal('hide');
            location.reload();
        }
    });
    
};

var update_reason_code = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addreasoncodefrm") },
        url: "api/v1/reasoncodes/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addReasonCode').modal('hide');
            location.reload();
        }							
    });
    
};

var del_reason_code = function() {
    var checkboxes = [];
    $("input.reasoncodebox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/reasoncodes/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-reason-code").hide();
    $("#save-reason-code").show();
    $('#addreasoncodefrm').each(function() {
        this.reset();
    });
    $('#addReasonCode').modal('show');
}

var show_edit_modal = function () {
    $("#save-reason-code").hide();
    $("#post-reason-code").show();
    var reclen = $("input.reasoncodebox:checked").length;
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
        url: "api/v1/reasoncodes/"+$("input.reasoncodebox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addReasonCode').modal('show');
    });
}

</script>
@stop	