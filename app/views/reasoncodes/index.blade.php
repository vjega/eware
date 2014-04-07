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
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New Reason Code</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected Reason Code</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected Reason Code</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Uom</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomfrm" id="adduomfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Uom Name </label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Uom Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Country</label>
                        <div class="col-sm-8">
                            <select name="country" id="country_code">
                                <option>India</option>
                                <option>Singapore</option>
                                <option>Malaysia</option>
                                <option>China</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">City</label>
                        <div class="col-sm-8">
                            <select name="city" id="city">
                                <option>Singapore</option>
                                <option>Chennai</option>
                                <option>Mumbai</option>
                                <option>Kolalambur</option>
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
           
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="address" name="address" placeholder="Type Uom Address Here"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Fax Number</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="fax_no" name="fax_no" value="" placeholder="Fax Number">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Tel Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="tel_no" value="" name="telno" placeholder="Tel Number eg. 91-44-244-65788">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Postal Code</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="postal_code" value="" name="postal_code" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Contact Name</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact_name" value="" name="cont_name" placeholder="John Doe">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Credit Limit</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="credit_limit" value="" name="credit_limit" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Payment Terms</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="payment_terms" value="" name="paymnt_terms" placeholder="John Doe">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Opening Hours</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="biz_hour" value="" name="opening_hours" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Service Level</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="party_service_level" value="" name="service_level" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order Priority</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="order_priority" value="" name="order_priority" placeholder="Order Priority">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Service Provided</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="services_provided" value="" name="service_provided" placeholder="">  
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