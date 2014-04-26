@extends('master')
<!-- Main Content -->
@section('content')
<div class="panel panel-default">
        <div class="panel-heading">Location Movement Ledger Report</div>
        <form id="locationledgerimportfrm" action="locationledgerxlimport" method="GET">
        <div class="panel-body">
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
    $("#xldownload").click(function(){
        $("#locationledgerimportfrm").submit();
    })
	
	$(".datepicker").datepicker({
		format: 'yyyy-mm-dd'

	});
})
</script>
@stop