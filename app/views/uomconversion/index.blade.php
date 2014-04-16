@extends('master')
<!-- Main Content -->
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>UOM Conversion Master</h3></div>
        <div class="panel-body">
            <table id="uomConversionList"></table>
            <div id="uomConversionPager"></div>
        </div>
        <div class="panel-footer">
            <button class="btn btn-inverse" data-toggle="modal" id="showUomPop">New UOM Conversion</button>
            <button class="btn btn-inverse" data-toggle="modal" id="editUomPop">Edit Selected UOM Conversion</button>
            <button class="btn btn-inverse" data-toggle="modal" id="delUom">Delete Selected UOM Conversion</button>
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
        <h4 class="modal-title" id="myModalLabel">Add/Edit Uom Conversion Master</h4>
      </div>
      <form class="form-horizontal" role="form" name="adduomconversionfrm" id="adduomconversionfrm">
      <div class="modal-body">      
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Client Code
							<span class="error">*</span>
						</label>
                        <div class="col-sm-6">
							<input type="hidden" class="form-control" id="id" value="" placeholder="">
                            <select name="client_code" id="client_code" class="form-control  validate[required]">
								<option value="">Select Client Code</option>
                                @foreach($clients as $cli)
                                    <option value="{{$cli->client_code}}">{{$cli->client_code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Product Number</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="product_number" value="" name="product_number" placeholder="">

                            </select>    
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">From Uom
							<span class="error">*</span>
						</label>
                        <div class="col-sm-6">
                        <select class="form-control validate[required]" id="from_uom" value="" name="from_uom" placeholder="">    
                            <option value="">Select From UOM</option>
                            @foreach($uoms as $u)
                            <option value="{{$u->uom_code}}">{{$u->description}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">Conversion Rate
							<span class="error">*</span>
						</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control validate[required]" id="conversion_rate" value="" name="conversion_rate" placeholder="Conversion Rate">  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-6 control-label">To Uom
							<span class="error">*</span>
						</label>
                        <div class="col-sm-6">
                        <select class="form-control validate[required]" id="uom_id" value="" name="uom_id" placeholder="">    
                            <option value="">Select To UOM</option>
                            @foreach($uoms as $u)
                            <option value="{{$u->uom_code}}">{{$u->description}}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save-uom">Save UOM Conversion</button>
        <button type="button" class="btn btn-primary" id="post-uom">Update UOM Conversion</button>
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
		if (($("#adduomconversionfrm").validationEngine("validate"))===true) {
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
});

var panelWidth = jQuery(".panel").width()-45;
jQuery("#uomConversionList").jqGrid({ 
    url:'api/v1/uomconversion',
    datatype: "json",
    height: 375,
    width: panelWidth,
    colNames:['<input type="checkbox"/>',
                'Client Code',
				'Product Number',
				'From UOM',
				'Conversion Rate',
				'To UOM'
            ],
    colModel:[
        {name:'select'},
		{name:'client_code'},
		{name:'product_number'},
		{name:'from_uom'},
		{name:'conversion_rate'},
		{name:'to_uom'}
    ], 
    rowNum:10, 
    rowList:[10,20,30], 
    pager: '#uomConversionPager', 
    viewrecords: true, 
    sortorder: "desc", 
    loadonce: true
});

var save_uom = function() {
    $.ajax({
        type: "POST",
        data: {'data':serilaizeJson("#adduomconversionfrm")},
        url: "api/v1/uomconversion",
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
        data: {'data': serilaizeJson("#adduomconversionfrm") },
        url: "api/v1/uomconversion/"+$("#id").val(),
    }).done(function(data){
        if(data) {
            $('#addUom').modal('hide');
            location.reload();
        }							
    });
    
};

var del_uom = function() {
    var checkboxes = [];
    $("input.uomconversionbox:checked").each(function(){
        checkboxes.push($(this).prop('id'));
    })
    $.ajax({
        type: "DELETE",
        data: {'data':'data'},
        url: "api/v1/uomconversion/"+checkboxes.join(','),
    }).done(function(data){
        if (data==="true") {
            location.reload();
        }
    });
    
};

var show_add_modal = function () {
    $("#post-uom").hide();
    $("#save-uom").show();
    $('#adduomconversionfrm').each(function() {
        this.reset();
    });
    $('#addUom').modal('show');
}

var show_edit_modal = function () {
    $("#save-uom").hide();
    $("#post-uom").show();
    var reclen = $("input.uomconversionbox:checked").length;
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
        url: "api/v1/uomconversion/"+$("input.uomconversionbox:checked").prop('id'),
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
        var optList = ""
        for(var d in data) {
            optList += "<option value='"+data[d].id+"'>"+data[d].product_code+"</option>";
        }
        $("#product_number").html(optList);
        console.log()
    })
    .fail(function() {
        console.log( "error" );
    });
}
 
</script>
@stop	