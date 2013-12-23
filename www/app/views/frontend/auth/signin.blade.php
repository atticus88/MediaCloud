@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Account Sign in ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="container">
	
	<div class="page-header">
		<h3>Sign in into your account</h3>
	</div>
	<div class="row">
		<form method="post" action="{{ route('signin') }}" class="form-horizontal">
			<!-- CSRF Token -->
			<input type="hidden" name="_token" value="{{ csrf_token() }}" />

			<!-- Email -->
			<div class="col-md-6">
				<div class=" control-form control-group{{ $errors->first('email', ' error') }}">
					<label class="control-label pull-left" for="email">Email</label>
					<div class="controls col-md-6">
						<input class="form-control" type="text" name="email" id="email" value="{{ Input::old('email') }}" />
						{{ $errors->first('email', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			<!-- Password -->
			<div class="col-md-6">
				
				<div class=" control-form control-group{{ $errors->first('password', ' error') }}">
					<label class="control-label pull-left" for="password">Password</label>
					<div class="controls col-md-6">
						<input class="form-control" type="password" name="password" id="password" value="" />
						{{ $errors->first('password', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
		</div>

		<!-- Remember me -->
		<div class="row">
			<div class="col-md-6">
				<div class="control-group">
					<div class="controls ">
						<label class="checkbox">
							<input type="checkbox" name="remember-me" id="remember-me" value="1" /> Remember me
						</label>
					</div>
				</div>
			</div>
		</div>

		<hr>

		<!-- Form actions -->
		<div class="control-group">
			<div class="controls">
				<button type="submit" class=" btn btn-success">Sign in</button>

				<a class="btn" href="{{ route('home') }}">Cancel</a>

				<a href="{{ route('forgot-password') }}" class="btn btn-link">I forgot my password</a>
			</div>
		</div>
	</form>
</div>
@stop
