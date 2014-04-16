@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Adjustments</h3></div>
        <div class="panel-body">
            <table id="adjustmentList"></table>
            <div id="adjustmentPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New Adjustment</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected Adjustment</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected Adjustment</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit  Adjustment</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomfrm" id="adduomfrm">
      <div class="modal-body">     
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
                             <select name="client_code" id="client_code" class="form-control">
								<option value="">Select Client Code</option>
                                @foreach ($clients as $cli)
                                <option value="{{$cli->client_code}}">{{$cli->client_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Adjustment Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker validate[required,minSize[6]. maxSize[12]] " id="adjustment_date" value="" name="adjustment_date" placeholder="Adjustment Date">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Adjustment Number</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control validate[required,minSize[6]. maxSize[12]]" id="adjustment_number" value="" name="adjustment_number" placeholder="Adjustment Number">    
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
                        <label for="" class="col-sm-4 control-label">Adjustment View</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="adjustment_view" value="" name="adjustment_view" placeholder="Adjustment View">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
					<table id="adjustments" class="table">  
						<thead>  
						  <tr>  
							<th>Delete</th>  
							<th>Product</th>  
							<th>Location</th>  
							<th>Quantity</th>  
							<th>Plus Qty</th>  
							<th>Minus Qty</th>  
						  </tr>  
						</thead>  
						<tbody>  
						  <tr class="trow">  
							<td><a class="btn deleteRow" href="#">Delete</a></td>  
							<td>
								<select class="form-control products" id="skuproduct">
								</select>
							</td>  
							<td><input readonly="" class="form-control locations" type="text" /></td>  
							<td><input class="form-control prodQty validate[required,minSize[6]. maxSize[12]]" type="text" /></td>  
							<td><input class="form-control validate[required,minSize[6]. maxSize[12]]" type="text" /></td>  
							<td><input class="form-control validate[required,minSize[6]. maxSize[12]]" type="text" /></td>  
						  </tr>
						</tbody>  
					  </table>  
					  <a href="#" class="btn btn-default pull-right" id="addMoreAdjustment">Add More</a>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-uom">Save Adjustment</button>
        <button type="button" class="btn btn-primary" id="post-uom">Update Adjustment</button>
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

$('#addMoreAdjustment').click(function(){
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
	$(".datepicker").datepicker();
	
    $("#save-uom").click(function(){
		if (($("#adduomfrm").validationEngine("validate"))===true) {
			  save_uom();
		}
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

    $("#client_code").change(function(){
        update_product_dropdown(this);
    })
    $("#skuproduct").change(function(){
        update_product_qty_dropdown(this);
    })
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#adjustmentList").jqGrid({ 
    url:'api/v1/adjustments',
    datatype: "json",
    height: 375,
    width: panelWidth,
	colNames:['<input type="checkbox"/>','Client Code','Adjustment Date','Adjustment number','Remarks','Reference No','Adjustment View'],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'adjustment_date'},
		{name:'adjustment_number'},
		{name:'remarks'},
		{name:'reference_no'},
		{name:'adjustment_view'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#adjustmentPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_uom = function() {
    var lineitems = [];
    $('#adjustments tr').each(function(idx){
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
                    lineitems[idx]['adjplusqty'] = $(this).val();
                    break;
                case 4:
                    lineitems[idx]['adjminusqty'] = $(this).val();
                    break;
            }
           
        })
    });
    lineitems.shift();
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#adduomfrm"),
               'lineitems' : JSON.stringify(lineitems)
              },
        url: "api/v1/adjustments",
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            //location.reload();
        }
    });
    
};

var update_uom = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#adduomfrm") },
        url: "api/v1/adjustments/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }							
    });
    
};

var del_uom = function() {
    var checkboxes = [];
    $("input.adjustmentbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/adjustments/"+checkboxes.join(','),
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
    var reclen = $("input.adjustmentbox:checked").length;
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
        url: "api/v1/adjustments/"+$("input.adjustmentbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addUom').modal('show');
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

$(".deleteRow").click(function(){
	$(this).parent().parent().hide();
});

</script>
@stop	