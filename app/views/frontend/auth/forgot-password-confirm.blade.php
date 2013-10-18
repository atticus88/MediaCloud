@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Forgot Password ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="container">
	
	<div class="page-header">
		<h3>Forgot Password</h3>
	</div>
	<form method="post" action="" class="form-horizontal">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- New Password -->
		<div class="row">

			<div class="control-group{{ $errors->first('password', ' error') }}">
				<label class="control-label pull-left" for="password">New Password</label>
				<div class="controls col-md-6">
					<input class="form-control" type="password" name="password" id="password" value="{{ Input::old('password') }}" />
					{{ $errors->first('password', '<span class="help-block">:message</span>') }}
				</div>
			</div>

			<!-- Password Confirm -->
			<div class="col-md-6">
				<div class="control-group{{ $errors->first('password_confirm', ' error') }}">
					<label class="control-label pull-left" for="password_confirm">Password Confirmation</label>
					<div class="controls col-md-6">
						<input class="form-control" type="password" name="password_confirm" id="password_confirm" value="{{ Input::old('password_confirm') }}" />
						{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
		</div>

		<hr>

		<!-- Form actions -->
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success">Submit</button>
				<a class="btn" href="{{ route('home') }}">Cancel</a>

			</div>
		</div>
	</div>
</form>
@stop
