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
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add/Edit Party/Business</h4>
      </div>
        <form class="form-horizontal" role="form">
      <div class="modal-body">      
            

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Party  Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="00013289" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Party Name </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="Sumsung" placeholder="Product Name ">
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="" class="col-sm-12 control-label">Product description</label>
                        <div class="col-sm-12">
                            <textarea name="" id=""  rows="5" class="form-control">Samsung 17" Monitors, 24 cottons 
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Category</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="Monitors/Televisions" placeholder="Product Category">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">UOM</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="numbers" placeholder="UOM">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Product Dimensions</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="" value="20x40x526" placeholder="Product Dimensions">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Serial Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="00000299930092" placeholder="Serial Number">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Expiry date</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" id="" value="03/12/2014" placeholder="Expiry date">    
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Storage Form</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>Solid</option>
                                <option>Hot</option>
                                <option>Cool</option>

                            </select>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Location Area</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" value="W23LC12" placeholder="Location Area">
                        </div>
                    </div>
                </div>
                
            </div>
                      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save Product</button>
      </div>
      </form>
    </div>
</div>
@stop


<!-- Page based Scripts -->
@section('script')
@stop