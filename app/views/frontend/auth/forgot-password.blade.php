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

		<!-- Email -->
		<div class="row">
			<div class="col-md-6">
				<div class=" control-form control-group{{ $errors->first('email', ' error') }}">
					<label class="control-label pull-left" for="email">Email</label>
					<div class="controls col-md-6">
						<input class="form-control" type="text" name="email" id="email" value="{{ Input::old('email') }}" />
						{{ $errors->first('email', '<span class="help-block">:message</span>') }}
					</div>
				</div>
			</div>
		</div>

		<hr>

		<!-- Form actions -->
		<div class="row">
			<div class="col-md-6">
				<div class="control-group">
					<div class="controls">
						<button type="submit" class="btn btn-success">Submit</button>
						<a class="btn" href="{{ route('signin') }}">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@stop
