@extends('master')
@section('content')
	<form class="form-signin" role="form">
		
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
        
        
      </form>
@stop

@section('script')

@stop
