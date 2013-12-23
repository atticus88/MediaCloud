@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Account Sign up ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="container">
	
	<div class="page-header">
		<h1>Sign up</h1>
	</div>
	<form method="post" action="{{ route('signup') }}" class="form-horizontal" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<!-- First Name -->
		<div class="row">
			<div class="col-md-6">
				<div class=" form-group control-group{{ $errors->first('first_name', ' error') }}">
					<label class="control-label col-md-3" for="first_name">First Name</label>
					<div class="controls col-md-9">
						<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" />
						{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>

			<!-- Last Name -->
			<div class="col-md-6">
				<div class=" form-group control-group{{ $errors->first('last_name', ' error') }}">
					<label class="control-label col-md-3" for="last_name">Last Name</label>
					<div class="controls col-md-9">
						<input class="form-control" type="text" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" />
						{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
		</div>
		<!-- Email -->
		<div class="row">
			<div class="col-md-6">

				<div class=" form-group control-group{{ $errors->first('email', ' error') }}">
					<label class="control-label col-md-3" for="email">Email</label>
					<div class="controls col-md-9">
						<input class="form-control" type="text" name="email" id="email" value="{{ Input::old('email') }}" />
						{{ $errors->first('email', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>			

			<!-- Email Confirm -->
			<div class="col-md-6">

				<div class=" form-group control-group{{ $errors->first('email_confirm', ' error') }}">
					<label class="control-label col-md-3" for="email_confirm">Confirm Email</label>
					<div class="controls col-md-9">
						<input class="form-control" type="text" name="email_confirm" id="email_confirm" value="{{ Input::old('email_confirm') }}" />
						{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
		</div>

		<!-- Password -->
		<div class="row">
			<div class="col-md-6">

				<div class=" form-group control-group{{ $errors->first('password', ' error') }}">
					<label class="control-label col-md-3" for="password">Password</label>
					<div class="controls col-md-9">
						<input class="form-control" type="password" name="password" id="password" value="" />
						{{ $errors->first('password', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>			

			<!-- Password Confirm -->
			<div class="col-md-6">

				<div class=" form-group control-group{{ $errors->first('password_confirm', ' error') }}">
					<label class="control-label col-md-3" for="password_confirm">Confirm Password</label>
					<div class="controls col-md-9">
						<input class="form-control" type="password" name="password_confirm" id="password_confirm" value="" />
						{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
		</div>
		<hr>

		<!-- Form actions -->
		<div class="control-group">
			<div class="controls col-md-6">
				<button type="submit" class="btn btn-success">Sign up</button>
				<a class="btn" href="{{ route('home') }}">Cancel</a>

			</div>
		</div>
	</form>
</div>
@stop

