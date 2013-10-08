@extends('layouts.scaffold')

@section('main')

<h1>Create Asset</h1>

{{ Form::open(array('route' => 'assets.store')) }}
	<ul>
        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description') }}
        </li>

        <li>
            {{ Form::label('filepath', 'Filepath:') }}
            {{ Form::text('filepath') }}
        </li>

        <li>
            {{ Form::label('filename', 'Filename:') }}
            {{ Form::text('filename') }}
        </li>

        <li>
            {{ Form::label('transcoded_url', 'Transcoded_url:') }}
            {{ Form::text('transcoded_url') }}
        </li>

        <li>
            {{ Form::label('thumbnail_url', 'Thumbnail_url:') }}
            {{ Form::text('thumbnail_url') }}
        </li>

        <li>
            {{ Form::label('url', 'Url:') }}
            {{ Form::text('url') }}
        </li>

        <li>
            {{ Form::label('type', 'Type:') }}
            {{ Form::text('type') }}
        </li>

        <li>
            {{ Form::label('status', 'Status:') }}
            {{ Form::text('status') }}
        </li>

        <li>
            {{ Form::label('tags', 'Tags:') }}
            {{ Form::text('tags') }}
        </li>

        <li>
            {{ Form::label('last_viewed', 'Last_viewed:') }}
            {{ Form::text('last_viewed') }}
        </li>

        <li>
            {{ Form::label('views', 'Views:') }}
            {{ Form::input('number', 'views') }}
        </li>

        <li>
            {{ Form::label('created_at', 'Created_at:') }}
            {{ Form::text('created_at') }}
        </li>

        <li>
            {{ Form::label('updated_at', 'Updated_at:') }}
            {{ Form::text('updated_at') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


