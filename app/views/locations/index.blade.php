@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Location Master</h3></div>
        <div class="panel-body">
            <table id="locationList"></table>
            <div id="locationPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showLocationPop">New Location</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editLocationPop">Edit Selected Location</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delLocation">Delete Selected Location</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Location</h4>
      </div>
      <form class="form-horizontal" role="form" name="addlocationfrm" id="addlocationfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Warehouse
							<span class="error">*</span>
						</label>
                        <div class="col-sm-6">
                            <select type="text" class="form-control validate[required]" id="name" name="name" >
                            <option value="">Select a warehouse</option>
                            @foreach ($sites as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Location
							<span class="error">*</span>
						</label>
                        <div class="col-sm-6">
                            <input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <input type="text" class="form-control validate[required]" id="location_no" name="location_no" value="" placeholder="Enter Location e.g. India">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Location Area</label>	 
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="location_area" id="location_area" placeholder="Enter Location Area Here" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Location Type</label>
                        <div class="col-sm-6">
                            <input type="text"  class="form-control" name="location_type" id="location_type" placeholder="Enter Location Type Here">
                        </div>
                    </div>
                </div>
                
            </div>
           
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Bin Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="" id="bin_number" name="bin_number" placeholder="Type Bin Number Here" />
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Maximum Volume</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="maximum_volume" name="maximum_volume" value="" placeholder="Type Maximum Volume Here">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
				
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Minimum Volume</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="minimum_volume" value="" name="minimum_volume" placeholder="Type Minimum Volume Here">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Location Condition</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="location_condition" value="" name="location_condition" placeholder="Type Location Condition Here">    
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Location Indicator</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="location_indicator" value="" name="location_indicator" placeholder="Type Location Indicator Here">  
                        </div>
                    </div>
                </div>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-location">Save Location</button>
        <button type="button" class="btn btn-primary" id="post-location">Update Location</button>
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
    $("#save-location").click(function(){
		if (($("#addlocationfrm").validationEngine("validate"))===true) {
			  save_location();
		}
    });
    $("#showLocationPop").click(function(){
        show_add_modal();
    });
    $("#editLocationPop").click(function(){
        show_edit_modal();
    });
    $("#delLocation").click(function(){
        del_location();
    });
    $("#post-location").click(function(){
        update_location();
    });
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#locationList").jqGrid({ 
    url:'api/v1/locations',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Location No','Warehouse Name','Location area','Location type','Bin Number','Maximum Volume','Minimum Volume','Location condition','Location Indicator'],
    colModel:[
        {name:'select'},
		{name:'location_no'},
		{name:'site_name'},
		{name:'location_area'},
		{name:'location_type'},
		{name:'bin_number'},
		{name:'maximum_volume'},
		{name:'minimum_volume'},
		{name:'location_condition'},
		{name:'location_indicator'},
		
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#locationPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_location = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addlocationfrm")},
        url: "api/v1/locations",
    }).done(function(data){
        if(data) {
            $('#addLocation').modal('hide');
            location.reload();
        }
    });
    
};

var update_location = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addlocationfrm") },
        url: "api/v1/locations/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addLocation').modal('hide');
            location.reload();
        }
    });
    
};

var del_location = function() {
    var checkboxes = [];
    $("input.locationbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/locations/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-location").hide();
    $("#save-location").show();
    $('#addlocationfrm').each(function() {
        this.reset();
    });
    $('#addLocation').modal('show');
}

var show_edit_modal = function () {
    $("#save-location").hide();
    $("#post-location").show();
    var reclen = $("input.locationbox:checked").length;
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
        url: "api/v1/locations/"+$("input.locationbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addLocation').modal('show');
    });
}

</script>
@stop