@extends('backend/layouts/default')

@section('content')

<h1>Edit Asset</h1>
{{ Form::model($asset, array('method' => 'POST', 'route' => array('update/asset', $asset->id))) }}
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

            {{$asset->last_viewed}}
        </li>

        <li>
            {{ Form::label('views', 'Views:') }}
            {{$asset->last_viewed}}

        </li>

        <li>
            {{ Form::label('created_at', 'Created_at:') }}
            {{$asset->last_viewed}}
        </li>

        <li>
            {{ Form::label('updated_at', 'Updated_at:') }}
            {{$asset->last_viewed}}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('assets', 'Cancel') }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
