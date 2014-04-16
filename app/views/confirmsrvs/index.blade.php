@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Confirm SRV Putaway</h3></div>
        <div class="panel-body">
            <table id="confirmSRVList"></table>
            <div id="confirmSRVPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showRVS">New SRV</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editRVS">Edit Selected SRV</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delRVS">Delete Selected SRV</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addRVS" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit SRV Putaway</h4>
      </div>
      <form class="form-horizontal" role="form" name="addrvsfrm" id="addrvsfrm">
      <div class="modal-body">      
            
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                           <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                           <select name="client_code" id="client_code" class="form-control validate[required,minSize[6]">
								<option value="">Select Client Code</option>
                                <option>0001</option>
                                <option>0002</option>
                                <option>0003</option>
                                <option>0004</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">RV No
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required,minSize[6]" id="rv_no" name="rv_no" value="" placeholder="">    
                        </div>
                    </div>
                </div>
                
            </div>
           
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-rvs">Save RVS</button>
        <button type="button" class="btn btn-primary" id="post-rvs">Update RVS</button>
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
    $("#save-rvs").click(function(){
		if (($("#addrvsfrm").validationEngine("validate"))===true) {
			   save_rvs();
		}
    });
    $("#showRVS").click(function(){
        show_add_modal();
    });
    $("#editRVS").click(function(){
        show_edit_modal();
    });
    $("#delRVS").click(function(){
        del_rvs();
    });
    $("#post-rvs").click(function(){
        update_rvs();
    });
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#confirmSRVList").jqGrid({ 
    url:'api/v1/confirmsrvs',
    datatype: "json",
    height: 375,
    width: panelWidth,
	colNames:['<input type="checkbox"/>','Client Code','RV Number'],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'rv_no'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#confirmSRVPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_rvs = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addrvsfrm")},
        url: "api/v1/confirmsrvs",
    }).done(function(data){
        if(data) {
            $('#addRVS').modal('hide');
            location.reload();
        }
    });
    
};

var update_rvs = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addrvsfrm") },
        url: "api/v1/confirmsrvs/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addRVS Putaway').modal('hide');
            location.reload();
        }							
    });
    
};

var del_rvs = function() {
    var checkboxes = [];
    $("input.rvsbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/confirmsrvs/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-rvs").hide();
    $("#save-rvs").show();
    $('#addrvsfrm').each(function() {
        this.reset();
    });
    $('#addRVS').modal('show');
}

var show_edit_modal = function () {
    $("#save-rvs").hide();
    $("#post-rvs").show();
    var reclen = $("input.rvsbox:checked").length;
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
        url: "api/v1/confirmsrvs/"+$("input.rvsbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addRVS').modal('show');
    });
}

</script>
@stop	