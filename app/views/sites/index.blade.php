@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Sites</h3></div>
        <div class="panel-body">
            <table id="siteList"></table>
            <div id="sitePager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showSitePop">New Site</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editSitePop">Edit Selected Site</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delSite">Delete Selected Site(s)</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addSite" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Site</h4>
      </div>
      <form class="form-horizontal" role="form" name="addsitefrm" id="addsitefrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Site Name </label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Site Name e.g. Acme Corp.">
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
                            <textarea class="form-control" id="address" name="address" placeholder="Type Site Address Here"></textarea>
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
        <button type="button" class="btn btn-primary" id="save-site">Save Site</button>
        <button type="button" class="btn btn-primary" id="post-site">Update Site</button>
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
    $("#save-site").click(function(){
        save_site();
    });
    $("#showSitePop").click(function(){
        show_add_modal();
    });
    $("#editSitePop").click(function(){
        show_edit_modal();
    });
    $("#delSite").click(function(){
        del_site();
    });
    $("#post-site").click(function(){
        update_site();
    });
});

var panelWidth = jQuery(".panel").width()-30;
jQuery("#siteList").jqGrid({ 
    url:'api/v1/sites',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>',
                'company_code',
                'name',
                'country',
                'region',
                'city',
                'currency',
                'addrs1',
                'addrs2',
                'addrs3',
                'email',
                'website',
                'tel_no1',
                'tel_no2',
                'fax_no',
                'postal_code',
                'biz_type',
                'biz_hours',
                'credit_limit',
                'priority',
                'zonal_level',
                'vendor_file',
                'customer_file',
                'support_source_file',
                'threepl_file'
            ],
    colModel:[
        {name:'select'},
        {name:'company_code'},
        {name:'name'},
        {name:'country'},
        {name:'region'},
        {name:'city'},
        {name:'currency'},
        {name:'addrs1'},
        {name:'addrs2'},
        {name:'addrs3'},
        {name:'email'},
        {name:'website'},
        {name:'tel_no1'},
        {name:'tel_no2'},
        {name:'fax_no'},
        {name:'postal_code'},
        {name:'biz_type'},
        {name:'biz_hours'},
        {name:'credit_limit'},
        {name:'priority'},
        {name:'zonal_level'},
        {name:'vendor_file'},
        {name:'customer_file'},
        {name:'support_source_file'},
        {name:'threepl_file'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#sitePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_site = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addsitefrm")},
        url: "api/v1/sites",
    }).done(function(data){
        if(data) {
            $('#addSite').modal('hide');
            location.reload();
        }
    });
    
};

var update_site = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addsitefrm") },
        url: "api/v1/sites/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addSite').modal('hide');
            location.reload();
        }
    });
    
};

var del_site = function() {
    var checkboxes = [];
    $("input.sitebox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/sites/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-site").hide();
    $("#save-site").show();
    $('#addsitefrm').each(function() {
        this.reset();
    });
    $('#addSite').modal('show');
}

var show_edit_modal = function () {
    $("#save-site").hide();
    $("#post-site").show();
    var reclen = $("input.sitebox:checked").length;
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
        url: "api/v1/sites/"+$("input.sitebox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addSite').modal('show');
    });
}

</script>
@stop