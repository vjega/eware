@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Stock Take - Cycle Count</h3></div>
        <div class="panel-body">
            <table id="stockTakeList"></table>
            <div id="stockTakePager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showStockTakesPop">New Stock</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editStockTakesPop">Edit Selected Stock</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delStockTakes">Delete Selected Stock</button>
        </div>
    </div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addStockTakes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Stock Take</h4>
      </div>
      <form class="form-horizontal" role="form" name="addstocktakesfrm" id="addstocktakesfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Client Code
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="hidden" class="form-control" id="id" value="18" placeholder="">
   							<select name="client_code" id="client_code" class="form-control  validate[required]">
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
                        <label for="" class="col-sm-4 control-label">Cycle Count Date</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" id="cycle_count_date" name="cycle_count_date" value="" placeholder="Cycle Count Date">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Reference No
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  validate[required]" id="reference_no" name="reference_no" value="" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Cycle Count No
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  validate[required]" id="cycle_count_no" name="cycle_count_no" value="" placeholder="">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">status</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="status" name="status" value="" placeholder="Status">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Remarks</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="remarks" name="remarks" value="" placeholder="Remarks">
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Stock
							<span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control  validate[required]" id="stock" name="stock" value="" placeholder="Stock">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Mark</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mark" name="mark" value="" placeholder="Mark">
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
						  </tr>  
						</thead>  
						<tbody>  
						  <tr class="trow">  
							<td><a class="btn deleteRow" href="#">Delete</a></td>  
							<td><select class="form-control products" id="skuproduct"></select></td>  
							<td><input readonly="" class="form-control locations  validate[required]" type="text" /></td>  
							<td><input class="form-control  validate[required]" type="text" /></td>
						  </tr>
						</tbody>  
					  </table>  
					  <a href="#" class="btn btn-default pull-right" id="addMoreStockTakes">Add More</a>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-stocktakes">Save Stock</button>
        <button type="button" class="btn btn-primary" id="post-stocktakes">Update Stock</button>
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

$('#addMoreStockTakes').click(function(){
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
	
    $("#save-stocktakes").click(function(){
		if (($("#addstocktakesfrm").validationEngine("validate"))===true) {
			  save_stocktakes();
		}
    });
    $("#showStockTakesPop").click(function(){
        show_add_modal();
    });
    $("#editStockTakesPop").click(function(){
        show_edit_modal();
    });
    $("#delStockTakes").click(function(){
        del_stocktakes();
    });
    $("#post-stocktakes").click(function(){
        update_stocktakes();
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
    })
	
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#stockTakeList").jqGrid({ 
    url:'api/v1/stocktakes',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>','Client Code','Cycle count Date','Reference No','Cycle count No','Status','Remarks','Stock','Mark','Confirm Cycle Count'],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'cycle_count_date'},
		{name:'reference_no'},
		{name:'cycle_count_no'},
		{name:'status'},
		{name:'remarks'},
		{name:'stock'},
		{name:'mark'},
		{name:'confirm_cycle_count'},
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#stockTakePager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_stocktakes = function() {
  var lineitems = [];
    $('#locTransfer tr').each(function(idx){
        lineitems[idx] = {}
        $(this).find('input,select').each(function(cidx){
            switch(cidx) {
                case 0:
                    lineitems[idx]['itemcode'] = $(this).val();
                    break;
                case 1:
                    lineitems[idx]['location'] = $(this).val();
                    break;
                case 2:
                    lineitems[idx]['qty'] = $(this).val();
                    break;
            }
           
        })
    });
	 lineitems.shift();
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#addstocktakesfrm"),
				'lineitems' : JSON.stringify(lineitems)
			  },
        url: "api/v1/stocktakes",
    }).done(function(data){
        if(data) {
            $('#addStockTakes').modal('hide');
            // location.reload();
        }
    });
    
};

var update_stocktakes = function() {
    $.ajax({
        type: "PATCH",
        data: {'data': serilaizeJson("#addstocktakesfrm") },
        url: "api/v1/stocktakes/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addStockTakes').modal('hide');
            location.reload();
        }
    });
    
};

var del_stocktakes = function() {
    var checkboxes = [];
    $("input.stockbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/stocktakes/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-stocktakes").hide();
    $("#save-stocktakes").show();
    $('#addstocktakesfrm').each(function() {
        this.reset();
    });
    $('#addStockTakes').modal('show');
}

var show_edit_modal = function () {
    $("#save-stocktakes").hide();
    $("#post-stocktakes").show();
    var reclen = $("input.stockbox:checked").length;
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
        url: "api/v1/stocktakes/"+$("input.stockbox:checked").prop('id'),
    }).done(function(data){
        for(var item in data){
            if (data.hasOwnProperty(item)) {
                $('#'+item).val(data[item]);
            }
        };
        $('#addStockTakes').modal('show');
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