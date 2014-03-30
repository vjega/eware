@extends('master')

<!-- Main Content -->
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading"><h3>Parties</h3></div>
		<div class="panel-body"></div>
		<div class="panel-footer">
			<button class="btn btn-inverse" data-toggle="modal" data-target="#addParty">New Party</button>
		</div>
	</div>
@stop


<!-- Add/edit popups -->
@section('popups')
<!-- add / Edit -->
<div class="modal fade" id="addParty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
@stop