@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Companies</h3></div>
        <div class="panel-body">
            <table id="companyList"></table>
            <div id="companyPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showCompanyPop">New Company</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editCompanyPop">Edit Selected Company</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delCompany">Delete Selected Company</button>
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
        <h4 class="modal-title" id="myModalLabel">Company</h4>
      </div>
      <form class="form-horizontal" role="form" name="addcompanyfrm" id="addcompanyfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-8 control-label">Country</label>
                        <div class="col-sm-3 offset-1">
                            <select name="country" id="country_code">
                                <option>India</option>
                                <option>Singapore</option>
                                <option>Malaysia</option>
                                <option>China</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
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
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Region</label>
                        <div class="col-sm-8">
                            <select name="city" id="city">
                                <option>North</option>
                                <option>South</option>
                                <option>West</option>
                                <option>East</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">No of Site</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Site Type</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Company Name </label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">City</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="address" name="address" placeholder="Type Company Address Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Google Earth</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="address" name="address" placeholder="Type Company Address Here"></textarea>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="address" name="address" placeholder="Type Company Address Here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address 2</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="addr2" name="addr2" placeholder="Type Company Address Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address 3</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="addr3" name="addr3" placeholder="Type Company Address Here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">State</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="state" name="state" placeholder="Type Company Address Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Postal Code</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="postal_code" name="postal_code" value="" placeholder="Fax Number">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" value="" name="email" placeholder="Tel Number eg. 91-44-244-65788">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Telephone 1</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tel_number" value="" name="tel_number" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Telephone 2</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tel_no_2" value="" name="tel_no_2" placeholder="John Doe">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Fax No</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="fax_number" value="" name="fax_number" placeholder="Postal Code">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Tax</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="tax" value="" name="tax" placeholder="John Doe">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Order Priority</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="order_priority" value="" name="order_priority" placeholder="Postal Code">    
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
                        <input type="text" class="form-control" id="service_provided" value="" name="service_provided" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Biz Type</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="biz_type" value="" name="biz_type" placeholder="Order Priority">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Biz Hours</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="biz_hours" value="" name="biz_hours" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Credit Limit</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="credit_limit" value="" name="credit_limit" placeholder="Order Priority">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Website</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="web_site" value="" name="web_site" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">3PL Contact</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact_name" value="" name="contact_name" placeholder="Order Priority">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Service Contract File</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="service_contract_file" value="" name="service_contract_file" placeholder="">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Company Instruction File</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="company_instruction_file" value="" name="company_instruction_file" placeholder="Order Priority">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Operation Policy File</label>
                        <div class="col-sm-8">
                        <input type="file" class="form-control" id="operation_policy_file" value="" name="operation_policy_file" placeholder="">  
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

var panelWidth = jQuery(".panel").width()-30;
jQuery("#companyList").jqGrid({ 
    url:'api/v1/companies',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Code','Country', 'region','site','No of sites',
              'Site Type','Name','City', 'Google Earth','Address', 'addr2','addr3','State',
              'Postal_code','email','Tel No.','Tel No.2', 
              'Fax Number','Tax', 'Order Priority','Service Level','Business Type','Business Hour', 'Credit Limit', 
              'Web Site', '3PL Contact'],
    colModel:[
        {name:'select'},{name:'id'},{name:'country'},{name:'region'},{name:'site'},{name:'site_number'},
        {name:'site_type'},{name:'name'},{name:'city'},{name:'google_earth'},{name:'address'},{name:'addr2'},{name:'addr3'},
        {name:'state'},
        {name:'postal_code'},{name:'email'},{name:'tel_number'},
        {name:'tel_no_2'},
        {name:'fax_number'},{name:'tax'},{name:'order_priority'},
        {name:'service_provided'},{name:'biz_type'},{name:'biz_hours'},{name:'credit_limit'},
        {name:'web_site'},{name:'contact_name'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#companyPager', 
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