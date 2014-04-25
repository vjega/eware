@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Location Transfer</h3></div>
        <div class="panel-body">
            <table id="locationTransferList"></table>
            <div id="locationTransferPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showLocTransferPop">New Location Transfer</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editLocTransferPop">Edit Selected Location Transfer</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delLocTransfer">Delete Selected Location Transfer</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addLocTransfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Location Transfer</h4>
      </div>
      <form class="form-horizontal" role="form" name="addloctransferfrm" id="addloctransferfrm">
      <div class="modal-body">     
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
   							<select name="client_code" id="client_code" class="form-control validate[required]">
    						    <option value="">Select Client</option>    
                                @foreach ($clients as $c)
                                <option value="{{$c->client_code}}">{{$c->client_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Movement Date
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker validate[required] " id="movement_date" value="" name="movement_date" placeholder="Movement Date">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Movement Number</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="movement_number" value="" name="movement_number" placeholder="Movement Number">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Remarks</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="remarks" value="" name="remarks" placeholder="Enter Remarks">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Reference No</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="reference_no" value="" name="reference_no" placeholder="Reference No">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Movement View</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="movement_view" value="" name="movement_view" placeholder="Movement View">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
					<table id="locTransfer" class="table">  
						<thead>  
						  <tr>  
							<th>Delete</th>  
							<th>Product <span class="error">*</span></th>  
							<th>Location <span class="error">*</span></th>  
							<th>Quantity <span class="error">*</span></th>  
							<th>To Location <span class="error">*</span></th>  
							<th>Quantity to Move <span class="error">*</span></th>  
						  </tr>  
						</thead>  
						<tbody>  
						  <tr class="trow">  
							<td><a class="btn deleteRow" href="#">Delete</a></td>  
							<td>
								<select class="form-control products " id="skuproduct">
								</select>
							</td>  
							<td><input readonly="" class="form-control locations validate[required]" type="text" /></td>  
							<td><input class="form-control prodQty validate[required]" type="text" /></td>  
							<td>
								<select class="form-control validate[required]">
									<option value="">Select Location</option>    
									@foreach ($locations as $l)
									<option value="{{$l->id}}">{{$l->location_no}}</option>
									@endforeach
								</select>
							</td>	
							<td><input class="form-control validate[required]" type="text" /></td>  
						  </tr>
						</tbody>  
					  </table>  
					  <a href="#" class="btn btn-default pull-right" id="addMoreLocTransfer">Add More</a>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-LocTransfer">Save Location Transfer</button>
        <button type="button" class="btn btn-primary" id="post-LocTransfer">Update Location Transfer</button>
      </div>
    </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
<style>
.datepicker{z-index:1561!important;}
</style>

<script>

$('#addMoreLocTransfer').click(function(){
	$('.trow:last').clone().insertAfter($('.trow:last'));
});

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

	$(".datepicker").datepicker({
		format: 'yyyy-mm-dd'

	});
	
    $("#save-LocTransfer").click(function(){
		if (($("#addloctransferfrm").validationEngine("validate"))===true) {
			 save_loctransfer();
		}
    });
    $("#showLocTransferPop").click(function(){
        show_add_modal();
    });
    $("#editLocTransferPop").click(function(){
        show_edit_modal();
    });
    $("#delLocTransfer").click(function(){
        del_loctransfer();
    });
    $("#post-LocTransfer").click(function(){
        update_loctransfer();
    });

    $("#client_code").change(function(){
        update_product_dropdown(this);
    });
    $("#skuproduct").change(function(){
        update_product_qty_dropdown(this);
    });
    $("body").on("click", ".deleteRow", function(){
        if ($(".deleteRow").length > 1) {
            $(this).parent().parent().remove();
        }
    });
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#locationTransferList").jqGrid({ 
    url:'api/v1/loctransfers',
    datatype: "json",
    height: 375,
    width: panelWidth,
	colNames:['<input type="checkbox"/>','Client Code','Movement Date','Movement Number','Remarks','Reference No','Movement View'],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'movement_date'},
		{name:'movement_number'},
		{name:'remarks'},
		{name:'reference_no'},
		{name:'movement_view'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#locationTransferPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_loctransfer = function() {
    var lineitems = [];
    $('#locTransfer tr').each(function(idx){
        lineitems[idx] = {}
        $(this).find('input,select').each(function(cidx){
            switch(cidx) {
                case 0:
                    lineitems[idx]['location'] = $(this).val();
                    break;
                case 1:
                    lineitems[idx]['itemcode'] = $(this).val();
                    break;
                case 2:
                    lineitems[idx]['qty'] = $(this).val();
                    break;
                case 3:
                    lineitems[idx]['tolocation'] = $(this).val();
                    break;
                case 4:
                    lineitems[idx]['qtytomove'] = $(this).val();
                    break;
            }
           
        })
    });
    lineitems.shift();
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addloctransferfrm"),
               'lineitems' : JSON.stringify(lineitems)
              },
        url: "api/v1/loctransfers",
    }).done(function(data){
        if(data) {
            $('#addLocTransfer').modal('hide');
            location.reload();
        }
    });
    
};

var update_loctransfer = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addloctransferfrm") },
        url: "api/v1/loctransfers/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addLocTransfer').modal('hide');
            location.reload();
        }							
    });
    
};

var del_loctransfer = function() {
    var checkboxes = [];
    $("input.loctransferbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/loctransfers/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-LocTransfer").hide();
    $("#save-LocTransfer").show();
    $('#addloctransferfrm').each(function() {
        this.reset();
    });
    $('#addLocTransfer').modal('show');
}

var show_edit_modal = function () {
    $("#save-LocTransfer").hide();
    $("#post-LocTransfer").show();
    var reclen = $("input.loctransferbox:checked").length;
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
        url: "api/v1/loctransfers/"+$("input.loctransferbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addLocTransfer').modal('show');
    });
}

var update_product_dropdown = function (elm) {
    $.ajax({
        url:"api/v1/skuproducts?client_code="+$(elm).val(),
        method:"GET"
    })
    .done(function(data) {
        var optList = "";
        for(var d in data) {
           	optList += "<option value='"+data[d].id+"'>"+data[d].product_code+"</option>";
        }
        $(".products").html(optList);
        $(".locations").val(data[0].location_area);
        $(".prodQty").val(data[0].quantity);
    })
    .fail(function() {
        console.log( "error" );
    });
}
var update_product_qty_dropdown = function (elm) {
    $.ajax({
        url:"api/v1/skuproducts?product_code="+$("#skuproduct option:selected" ).val(),
        method:"GET"
    })
    .done(function(data) {
        $(".locations").val(data[0].location_area);
        $(".prodQty").val(data[0].quantity);
    })
    .fail(function() {
        console.log( "error" );
    });
}
</script>
@stop