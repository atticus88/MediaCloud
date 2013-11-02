@extends('backend/layouts/admin')

{{-- Page title --}}
@section('title')
User Management ::
@parent
@stop

@section('content')
               {{Breadcrumbs::render('assets')}}

<div class="page-header">

<h1>All Assets

<div class="pull-right">
			<a href="{{ URL::route('upload/asset') }}" class="btn btn-small btn-info"><i class="icon-plus-sign icon-white"></i> Upload</a>
		</div>
</h1>
</div>

@if (count($assets) >= 1)
<div class="pull-right">
{{$assets->appends(array('sort' => 'created_at'))->links(); }}
</div>
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Title</th>
				<th>Description</th>
				<th>Filepath</th>
				<th>Filename</th>
				<th>Transcoded_url</th>
				<th>Thumbnail_url</th>
				<th>Url</th>
				<th>Type</th>
				<th>Status</th>
				<th>Tags</th>
				<th>Views</th>
				<th>Last_viewed</th>
				<th>Created_at</th>
				<th>Updated_at</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($assets as $asset)
				<tr>
					<td>{{{ $asset->title }}}</td>
					<td>{{{ $asset->description }}}</td>
					<td>{{{ $asset->filepath }}}</td>
					<td>{{{ $asset->filename }}}</td>
					<td>{{{ $asset->transcoded_url }}}</td>
					<td>{{{ $asset->thumbnail_url }}}</td>
					<td>{{{ $asset->url }}}</td>
					<td>{{{ $asset->type }}}</td>
					<td>{{{ $asset->status }}}</td>
					<td>{{{ $asset->tags }}}</td>
					<td>{{{ $asset->views }}}</td>
					<td>{{{ $asset->last_viewed }}}</td>
					<td>{{{ $asset->created_at }}}</td>
					<td>{{{ $asset->updated_at }}}</td>
                    <td>{{ link_to_route('update/asset', 'Edit', array($asset->id), array('class' => 'btn btn-info')) }}</td>
                    <td>

                    <form method="DELETE" action="{{action('Controllers\Admin\AssetsController@getDelete',$asset->id )}}" accept-charset="UTF-8">
                    	<input type="hidden" name="_method" value="delete" />
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                    </form>
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>


@else
	There are no assets
@endif

@stop
