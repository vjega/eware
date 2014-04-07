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
            <button class="btn btn-inverse" data-toggle="modal" id="showCompanyPop">New Location</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editCompanyPop">Edit Selected Location</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delCompany">Delete Selected Location</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Client</h4>
      </div>
      <form class="form-horizontal" role="form" name="addcompanyfrm" id="addcompanyfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="code" name="code" value="" placeholder="Enter Client Code e.g. ACMC">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Company Name </label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
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
                            <textarea class="form-control" id="address" name="address" placeholder="Type Company Address Here"></textarea>
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
        <button type="button" class="btn btn-primary" id="save-company">Save Company</button>
        <button type="button" class="btn btn-primary" id="post-company">Update Company</button>
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
    $("#save-company").click(function(){
        save_company();
    });
    $("#showCompanyPop").click(function(){
        show_add_modal();
    });
    $("#editCompanyPop").click(function(){
        show_edit_modal();
    });
    $("#delCompany").click(function(){
        del_company();
    });
    $("#post-company").click(function(){
        update_company();
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
		{name:'warehouse_name'},
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
    pager: '#skuProductsPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_company = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addcompanyfrm")},
        url: "api/v1/companies",
    }).done(function(data){
        if(data) {
            $('#addCompany').modal('hide');
            location.reload();
        }
    });
    
};

var update_company = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addcompanyfrm") },
        url: "api/v1/companies/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addCompany').modal('hide');
            location.reload();
        }
    });
    
};

var del_company = function() {
    var checkboxes = [];
    $("input.companybox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/companies/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-company").hide();
    $("#save-company").show();
    $('#addcompanyfrm').each(function() {
        this.reset();
    });
    $('#addCompany').modal('show');
}

var show_edit_modal = function () {
    $("#save-company").hide();
    $("#post-company").show();
    var reclen = $("input.companybox:checked").length;
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
        url: "api/v1/companies/"+$("input.companybox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addCompany').modal('show');
    });
}

</script>
@stop