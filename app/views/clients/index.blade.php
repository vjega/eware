@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Client Master</h3></div>
        <div class="panel-body">
            <table id="clientsList"></table>
            <div id="clientsPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showclientPop">New Client</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editclientPop">Edit Selected Client</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delclient">Delete Selected Client</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Client</h4>
      </div>
      <form class="form-horizontal" role="form" name="addclientfrm" id="addclientfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
							<input class="form-control" name="client_code" id="client_code" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Company Name </label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                            <select type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                                @foreach ($company as $com)
                                    <option value="{{$com->id}}">{{$com->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Country</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="country" id="country">
								<option value="">Select Country</option>
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
                            <select class="form-control" name="city" id="city">
								<option value="">Select City</option>
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
                            <input type="text" class="form-control" id="tel_no" value="" name="tel_no" placeholder="Tel Number eg. 91-44-244-65788">
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
                        <input type="text" class="form-control" id="contact_name" value="" name="contact_name" placeholder="John Doe">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Credit Limit</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="credit_limit" value="" name="credit_limit" placeholder="0.00">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Payment Terms</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="paymnt_terms" value="" name="paymnt_terms" placeholder="90 Day Credit">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">business Hours</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="biz_hour" value="" name="biz_hour" placeholder="Business Hours">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Service Level</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="party_service_level" value="" name="party_service_level" placeholder="">  
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
        <button type="button" class="btn btn-primary" id="save_client">Save Client</button>
        <button type="button" class="btn btn-primary" id="post_client">Update Client</button>
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
    $("#save_client").click(function(){
        save_client();
    });
    $("#showclientPop").click(function(){
        show_add_modal();
    });
    $("#editclientPop").click(function(){
        show_edit_modal();
    });
    $("#delclient").click(function(){
        del_client();
    });
    $("#post_client").click(function(){
        update_client();
    });
});

var panelWidth = jQuery(".panel").width()-30;
jQuery("#clientsList").jqGrid({ 
    url:'api/v1/clients',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Code','Name', 'Country', 'City', 'Address', 'Fax Number', 'Telephone Number', 'Postal Code', 'Contact Name', 'Credit Limit', 'Payment Terms', 'Business Hour', 'Company service Level', 'Order Priority', 'Services Provided', 'Created Date'],
    colModel:[
        {name:'select'},
        {name:'id'},
        {name:'name'},
        {name:'country_code'},
        {name:'city'},
        {name:'address'},
        {name:'fax_no'},
        {name:'tel_no'},
        {name:'postal_code'},
        {name:'contact_name'},
        {name:'credit_limit'},
        {name:'payment_terms'},
        {name:'business_hour'},
        {name:'clients_service_level'},
        {name:'order_priority'},
        {name:'service_provided'},
        {name:'created_at'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#clientsPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_client = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addclientfrm")},
        url: "api/v1/clients",
    }).done(function(data){
        if(data) {
            $('#addClient').modal('hide');
            location.reload();
        }
    });
    
};

var update_client = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addclientfrm") },
        url: "api/v1/clients/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addclient').modal('hide');
            location.reload();
        }
    });
    
};

var del_client = function() {
    var checkboxes = [];
    $("input.clientbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/clients/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post_client").hide();
    $("#save_client").show();
    $('#addclientfrm').each(function() {
        this.reset();
    });
    $('#addClient').modal('show');
}

var show_edit_modal = function () {
    $("#save_client").hide();
    $("#post_client").show();
    var reclen = $("input.clientbox:checked").length;
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
        url: "api/v1/clients/"+$("input.clientbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addClient').modal('show');
    });
}

</script>
@stop