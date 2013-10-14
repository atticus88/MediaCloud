@extends('backend/layouts/admin')

{{-- Page title --}}
@section('title')
User Update ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h1>
		User Update

		<div class="pull-right">
			<a href="{{ route('users') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h1>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-permissions" data-toggle="tab">Permissions</a></li>
</ul>



<form method="POST"  class="form-horizontal" >

<!-- CSRF Token -->
{{Form::token()}}

<!-- Tabs Content -->
<div class="tab-content">

	<!-- General tab -->
	<div class="tab-pane active" id="tab-general">
			<div class="form-body">
				<div class="row">
					<div class="col-md-6">
						<!-- First Name -->
						<div class="form-group">
							<label class="control-label col-md-3">First Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control" >
								<!-- <span class="help-block">Give your Asset a title</span> -->
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Last Name</label>
							<div class="col-md-9">
								<input type="text" class="form-control" >
							</div>
						</div>
					</div>             
				</div><!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Email</label>
							<div class="col-md-9">
								<input type="text" class="form-control" >
							</div>
						</div>
					</div>
				</div><!--/row-->
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-9">
								<input type="text" class="form-control" >
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label col-md-3">Confirm Password</label>
							<div class="col-md-9">
								<input type="text" class="form-control">
							</div>
						</div>
					</div>
				</div><!--/row-->
			</div><!--/form-body-->
	</div>

	<!-- Permissions tab -->
	<div class="tab-pane" id="tab-permissions">
		<div class="controls">
			<div class="control-group">

				@foreach ($permissions as $area => $permissions)
				<fieldset>
					<legend>{{ $area }}</legend>

					@foreach ($permissions as $permission)
					<div class="control-group" style="margin-bottom: 50px;">
						<label class="control-group">{{ $permission['label'] }}</label>

						<div class="radio inline">
							<label for="{{ $permission['permission'] }}_allow" onclick="">
								<input type="radio" value="1" id="{{ $permission['permission'] }}_allow" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($userPermissions, $permission['permission']) === 1 ? ' checked="checked"' : '') }}>
								Allow
							</label>
						</div>

						<div class="radio inline" style="margin: 25px;">
							<label for="{{ $permission['permission'] }}_deny" onclick="">
								<input type="radio" value="-1" id="{{ $permission['permission'] }}_deny" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($userPermissions, $permission['permission']) === -1 ? ' checked="checked"' : '') }}>
								Deny
							</label>
						</div>

						@if ($permission['can_inherit'])
						<div class="radio inline">
							<label for="{{ $permission['permission'] }}_inherit" onclick="">
								<input type="radio" value="0" id="{{ $permission['permission'] }}_inherit" name="permissions[{{ $permission['permission'] }}]"{{ ( ! array_get($userPermissions, $permission['permission']) ? ' checked="checked"' : '') }}>
								Inherit
							</label>
						</div>
						@endif
					</div>
					@endforeach

				</fieldset>
				@endforeach
			</div>
		</div>
	</div>
</div>	

	<!-- Form Actions -->
	<div class="control-group">
		<div class="controls">
			<a class="btn btn-link" href="{{ route('users') }}">Cancel</a>

			<button type="reset" class="btn">Reset</button>

			<button type="submit" class="btn btn-success">Update User</button>
		</div>
	</div>
</form>
@stop
