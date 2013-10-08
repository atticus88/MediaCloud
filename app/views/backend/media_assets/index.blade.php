@extends('backend/layouts/default')

@section('content')

	@foreach ($assets as $asset)
	    <p>This is asset {{ $asset->id }} {{$asset->title}} {{$asset->description}} </p>
	@endforeach


@stop









