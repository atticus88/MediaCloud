@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Your Profile
@stop

{{-- Account page content --}}
@section('account-content')
<div class="container">
<div class="page-header">
	<h1>Update your Profile</h1>
</div>

	<form method="post" action="" class="form-horizontal" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="row">
		<div class="col-md-6">

			<!-- First Name -->
			<div class="form-group control-group{{ $errors->first('first_name', ' error') }}">
				<label class="control-label col-md-3" for="first_name">First Name</label>
				<div class="controls col-md-9">					
				<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name', $user->first_name) }}" />
					{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
				</div>
			
			</div>
		</div>
			<!-- Last Name -->
		<div class="col-md-6">
			<div class="form-group control-group{{ $errors->first('last_name', ' error') }}">
				<label class="control-label col-md-3" for="last_name">Last Name</label>
				<div class="controls col-md-9">
					<input class=" form-control" type="text" name="last_name" id="last_name" value="{{ Input::old('last_name', $user->last_name) }}" />
					{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
				</div>
			</div>
		</div>
	</div>

	<!-- Website URL -->
	<div class="row">	
		<div class="col-md-6">		
			<div class=" form-group control-group{{ $errors->first('website', ' error') }}">
				<label class="control-label col-md-3" for="website">Website URL</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="website" id="website" value="{{ Input::old('website', $user->website) }}" />
					{{ $errors->first('website', '<span class="help-block">:message</span>') }}
				</div>
			</div>
		</div>
	</div>
	

	<!-- Country -->
	<div class="row">
		<div class="col-md-6">
			<div class=" form-group control-group{{ $errors->first('country', ' error') }}">
				<label class="control-label col-md-3" for="country">Country</label>
				<div class="col-md-9">
					<input class="form-control" type="text" name="country" id="country" value="{{ Input::old('country', $user->country) }}" />
					{{ $errors->first('country', '<span class="help-block">:message</span>') }}
				</div>
			</div>
		</div>

		<!-- Gravatar Email -->
		<div class="col-md-6">

			<div class=" form-group control-group{{ $errors->first('gravatar', ' error') }}">
				<label class="control-label col-md-3" for="gravatar">Gravatar Email <small>(Private)</small></label>
				<div class="controls col-md-9">
				<input class="form-control" type="text" name="gravatar" id="gravatar" value="{{ Input::old('gravatar', $user->gravatar) }}" />
					{{ $errors->first('gravatar', '<span class="help-block">:message</span>') }}
				</div>

				<p>
					<img src="//secure.gravatar.com/avatar/{{ md5(strtolower(trim($user->gravatar))) }}" width="30" height="30" />
					<a href="http://gravatar.com">Change your avatar at Gravatar.com</a>.
				</p>
			</div>
		</div>
	</div>
	<!-- Form actions -->
	<div class="control-group">
		<div class="controls">
			<button type="submit" class=" btn btn-success">Update your Profile</button>
		</div>
	</div>
</div>
	</div>

	<hr>

</form>
@stop
