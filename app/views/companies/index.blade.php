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
      <form class="form-horizontal" role="form" name="addcompanyfrm" id="addcompanyfrm" enctype="multipart/form-data">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Country</label>
                        <div class="col-sm-7">
                            <select name="country" id="country_code" class="form-control">
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
                        <label for="" class="col-sm-5 control-label">Region</label>
                        <div class="col-sm-7">
                            <select name="region" id="region" class="form-control">
                                <option value="North">North</option>
                                <option value="South">South</option>
                                <option value="West">West</option>
                                <option value="East">East</option>
                            </select>
                        </div>
                    </div>
                </div>				
            </div>
            <div class="row">
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Currency</label>
                        <div class="col-sm-7">
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                                <option value="INR">INR</option>
                                <option value="EURO">EURO</option>
                            </select>
                        </div>
                    </div>
                </div>                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">No. of Site</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control validate[required]" id="number_of_site" name="number_of_site" value="" placeholder="Enter No. of Site">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Site Type</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="site_type" name="site_type" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Company Name </label>
                        <div class="col-sm-7">
                            <input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <input type="text" class="form-control" id="company_name" name="company_name" value="" placeholder="Enter Company Name e.g. Acme Corp.">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">City</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Type City Here" />
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Google Earth</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="google_earth" name="google_earth" placeholder="Type Google Earth Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Address 1</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="address1" name="address1" placeholder="Type Address 1 Here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Address 2</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="address2" name="address2" placeholder="Type Address 2 Here"></textarea>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Address 3</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="address3" name="address3" placeholder="Type Address 3 Here"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">State</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="state" name="state" placeholder="Type State Here" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Postal Code</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="postal_code" name="postal_code" value="" placeholder="Type Postal Code Here">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="email" value="" name="email" placeholder="Type Email Here">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Telephone 1</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="tel_number1" value="" name="tel_number1" placeholder="Type Telephone Number 1 Here"> 
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Telephone 2</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="tel_number2" value="" name="tel_number2" placeholder="Type Telephone Number 2 Here">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Fax No</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="fax_number" value="" name="fax_number" placeholder="Type Fax Number Here">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Tax</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="tax" value="" name="tax" placeholder="Type Tax Here">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Order Priority</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="order_priority" value="" name="order_priority" placeholder="Type Order Priority Here">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Service Level</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="service_level" value="" name="service_level" placeholder="Type Service Level Here">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Service Provided</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="service_provided" value="" name="service_provided" placeholder="Type Service Provided">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Biz Type</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="biz_type" value="" name="biz_type" placeholder="Type Biz Type Here">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Biz Hours</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="biz_hours" value="" name="biz_hours" placeholder="Type Biz Hours Here">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Credit Limit</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="credit_limit" value="" name="credit_limit" placeholder="Type Credit Limit Here">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Website</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="web_site" value="" name="web_site" placeholder="Type Website URL Here">  
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">3PL Contact</label>
                        <div class="col-sm-7">
                        <input type="text" class="form-control" id="contact_name" value="" name="contact_name" placeholder="Type 3PL Contact Here">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Service Contract File</label>
                        <div class="col-sm-7">
						<span class="btn btn-default btn-file col-sm-12">
							Browse <input type="file" id="service_contract_file" name="service_contract_file">
						</span>
                        <!-- input type="file" class="form-control" id="service_contract_file" value="" name="service_contract_file" placeholder="" -->  
                        </div>
                    </div>
                </div>
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Operation Policy File</label>
                        <div class="col-sm-7">
							<span class="btn btn-default btn-file col-sm-12">
								Browse <input type="file" id="operation_policy_file" name="operation_policy_file" >
							</span>
	                        <!-- input type="file" class="form-control" id="operation_policy_file" value="" name="operation_policy_file" placeholder="" -->  
                        </div>
                    </div>
                </div>				
            </div>
            <div class="row">
				<div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Company Instruction File</label>
                        <div class="col-sm-6">
						<span class="btn btn-default btn-file col-sm-12">
							Browse <input type="file" id="company_instruction_file" name="company_instruction_file" >
						</span>
                        <!--input type="file" class="form-control" id="company_instruction_file" name="company_instruction_file" placeholder="Order Priority"-->    
                        </div>
                    </div>
                </div>                
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="save-company">Save Company</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="post-company">Update Company</button>
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
	alert($("#addcompanyfrm").validationEngine());
    $("#save-company").click(function(){
		
		if(!$("#addcompanyfrm").validationEngine('vlidate')){
			return false;
		}
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
    colNames:['<input type="checkbox"/>','Country','Region','Currency','Number Of Site','Site Type','Company Name','City','Google Earth','Address1','Address2','Address3','State','Postal Code','Email','Tel Number1','Tel Number2','Fax Number','Tax','Order Priority','Service Level','Service Provided','Biz Type','Biz Hours','Credit Limit','Web Site','Contact Name'],
    colModel:[
        {name:'select'},
		{name:'country'},
		{name:'region'},
		{name:'currency'},
		{name:'number_of_site'},
		{name:'site_type'},
		{name:'company_name'},
		{name:'city'},
		{name:'google_earth'},
		{name:'address1'},
		{name:'address2'},
		{name:'address3'},
		{name:'state'},
		{name:'postal_code'},
		{name:'email'},
		{name:'tel_number1'},
		{name:'tel_number2'},
		{name:'fax_number'},
		{name:'tax'},
		{name:'order_priority'},
		{name:'service_level'},
		{name:'service_provided'},
		{name:'biz_type'},
		{name:'biz_hours'},
		{name:'credit_limit'},
		{name:'web_site'},
		{name:'contact_name'},
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
		async: false
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
        url: "api/v1/companies/"+$("#id").val()
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