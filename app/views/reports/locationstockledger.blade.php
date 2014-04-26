@extends('master')
<!-- Main Content -->
@section('content')
<div class="panel panel-default">
        <div class="panel-heading">Location Stock Ledger</div>
        <form id="locationstockimportfrm" action="locationstockledgerxlimport" method="GET">
        <div class="panel-body">
             <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">From
							 <span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required] datepicker" name="from_dt" id="from_dt" value="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">To
							 <span class="error">*</span>
						</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control validate[required] datepicker " name="to_dt" id="to_dt" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <div class="panel-footer">
            <button type="button" class="btn btn-primary">Preview</button>
            <button type="button" class="btn btn-primary" id="xldownload">Download Excel</button>
        </div>
    </div>
@stop

<!-- Page based Scripts -->
@section('script')
<style>
.datepicker{z-index:1561!important;}
</style>
<script>
$(document).ready(function(){
	$("#locationstockimportfrm").validationEngine();
    $("#xldownload").click(function(){
        $("#locationstockimportfrm").submit();
    })
	
	$(".datepicker").datepicker({
		format: 'yyyy-mm-dd'

	});
})
</script>
@stop