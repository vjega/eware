@extends('master')
@section('content')
	<!-- <form class="form-signin" role="form">
		
		<div class="panel panel-default" style="width:400px; margin:100px auto">
			<div class="panel-heading"><h2 class="form-signin-heading">Please sign in</h2></div>
			<div class="panel-body">
				<input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
        <input type="password" class="form-control" placeholder="Password" required="">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</div>
		</div>
        
        
      </form> -->


      <div class="panel panel-default">
      	<div class="panel-heading">
      		<h2>Sites</h2>
      		<div class="panel-body">
      			<form class="form-horizontal" role="form">

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Country</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Country">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Region</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Region">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Currency</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Currency">
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Site</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Site">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Company</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Company">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="City">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Google Earth</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Google Earth">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address 1</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Address 1">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address 2</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Address 2">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Address 3</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Address 3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">State</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="State">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Zip Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="" placeholder="Zip Code">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="" placeholder="e-mail">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Phone 1</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="" placeholder="Phone 1">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Phone 2</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="" placeholder="Phone 2">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Fax</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="" placeholder="Fax">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Tax</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>12.5 %</option>
                                <option>10 %</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Priority</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Sevice Level</label>
                        <div class="col-sm-8">
                            <select class="form-control">
                                <option>Level 1</option>
                                <option>Level 2</option>
                                <option>Level 3</option>

                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Sevice Contract</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="" placeholder="Fax">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Instructions</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="" placeholder="Fax">
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="" class="col-sm-4 control-label">Opration Policy</label>
                        <div class="col-sm-8">
                            <input type="file" class="form-control" id="" placeholder="Fax">
                        </div>
                    </div>
                </div>
            </div>

           
                       
        </form>
      		</div>
      		<div class="panel-footer">
      			<div class="pull-right ">
                
                    <button type="submit" class="btn btn-default"><i class="fa fa-floppy-o"></i> Save changes</button>
                    <button type="submit" class="btn btn-default"><i class="fa fa-refresh"></i> List All Sites</button>               
               
            	</div> 
				<div class="clearfix"></div>
      		</div>
      	</div>
      </div>


@stop

@section('script')

@stop
