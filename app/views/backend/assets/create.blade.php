@extends('backend/layouts/admin')

@section('scripts')
<script src="//cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js" type="text/javascript"></script>
<script src="/assets/js/nestedSortable/jquery-sortable.js" type="text/javascript"></script>

<script>
	$( document ).ready(function( $ ) {
		$('.typeahead').typeahead({
			name: 'username',
			prefetch: '/users'
		});
		$('.collection-add').click(function(e){
			$(e.target).closest('.organization-container').find('#organization')
			.prepend($('<li class="collection collection-new"><input class="input" type="text" placeholder="Collection Name" /><ol></ol></li>'));
		});
		$('.collection-remove').click(function(e){
			$(e.target).closest('.organization-container').find('.collection-new:last')
			.remove();
		});

		$('.playlist-add').click(function(e){
			$(e.target).closest('.collection').find("ol:first")
			.prepend($('<li class="playlist playlist-new "><input class="input" type="text" placeholder="Playlist Name"/><ol></ol></li>'));
		});

		$('.playlist-remove').click(function(e){
			$(e.target).closest('.collection').find('.playlist-new:last').remove();
			
		});

		// CPA list
		$("#organization").sortable({
		// group: 'asset-orgainizer'

		})
	});

</script>


@stop

@section('css')
   <link href="/assets/js/nestedSortable/default.css" rel="stylesheet" type="text/css"/>
   <link href="/assets/css/typeahead.css" rel="stylesheet" type="text/css"/>
@stop

@section('content')
{{Breadcrumbs::render('createAsset')}}
<div class="page-header">
	<h1>
		Upload Asset for user

		<div class="pull-right">
			<a href="{{ route('assets') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
		</div>
	</h1>
</div>


<form method="POST" action="{{action('Controllers\Admin\AssetsController@postUpload')}}" accept-charset="UTF-8" class="form-horizontal">


	 
		<div class="row">  
			<div class="col-md-4"> 
			 <div class="form-group">
				 <label class="control-label col-md-3">Owner</label>
				 <div>
						<input type="text" class="typeahead">
				 </div>
			 </div>
		 </div>
	 <div class="col-md-6">
		<div class="asset-orgainizer">
			<div class="asset-container">
			<!-- 	<div class="toolbar">
					<input type="checkbox">
					<input type="text" placeholder="filter">
				</div> -->
				<!-- <div class="asset-list">
					<ol id="assets">
						<li class="asset" data-asset-id="1">Video 1</li>
						<li class="asset" data-asset-id="2">Video 2</li>
						<li class="asset" data-asset-id="3">Video 3</li>
						<li class="asset" data-asset-id="4">Video 4</li>
						<li class="asset" data-asset-id="5">Video 5</li>
						<li class="asset" data-asset-id="6">Video 6</li>
						<li class="asset" data-asset-id="7">Video 7</li>
						<li class="asset" data-asset-id="8">Video 8</li>
						<li class="asset" data-asset-id="9">Video 9</li>
						<li class="asset" data-asset-id="10">Video 10</li>
						<li class="asset" data-asset-id="11">Video 11</li>
						<li class="asset" data-asset-id="12">Video 12</li>
						<li class="asset" data-asset-id="13">Video 13</li>
						<li class="asset" data-asset-id="14">Video 14</li>
						<li class="asset" data-asset-id="15">Video 15</li>
						<li class="asset" data-asset-id="16">Video 16</li>
						<li class="asset" data-asset-id="17">Video 17</li>
						<li class="asset" data-asset-id="18">Video 18</li>
						<li class="asset" data-asset-id="19">Video 19</li>
						<li class="asset" data-asset-id="20">Video 20</li>
					</ol>
				</div> -->
			</div>
			<div class="organization-container">
				<div class="toolbar">
					<span><i class="fa fa-plus collection-add"></i></span>
					<span><i class="fa fa-minus collection-remove"></i></span>
					<span><i class="fa fa-arrows-v"></i></span>
				</div>

				<div class="organization-list" >
					<ol id="organization"  class="">
						<li class="collection" data-collection-id="1">Collection - Math Department 
						 <span><i class="fa fa-plus playlist-add"></i></span> 
						 <span><i class="fa fa-minus playlist-remove"></i></span>
						 <hr>
							<ol>
								<li class="playlist" data-playlist-id="1">Playlist - Math Department 1
								 <ol></ol></li>
								<li class="playlist" data-playlist-id="2">Playlist - Math Department 2 <ol></ol></li>
							</ol>
						</li>
						<li class="collection" data-collection-id="2">Collection - Health Department
							 <span><i class="fa fa-plus playlist-add"></i></span> 
							 <span><i class="fa fa-minus playlist-remove"></i></span>
							 <hr>
							<ol>
								<li class="playlist" data-playlist-id="3">Playlist - Health Department 1<ol></ol></li>
								<li class="playlist" data-playlist-id="4">Playlist - Health Department 2<ol></ol></li>
							</ol>
						</li>
						<li class="collection" data-collection-id="3">Collection - Science Department
							<span><i class="fa fa-plus playlist-add"></i></span> 
							 <span><i class="fa fa-minus playlist-remove"></i></span>
							 <hr>
							<ol>
								<li class="playlist" data-playlist-id="5">Playlist - Science Department 1<ol></ol></li>
								<li class="playlist" data-playlist-id="6">Playlist - Science Department 2<ol></ol></li>
							</ol>
						</li>
					</ol>
				</div>
			</div>
		</div>





	</div>
</div>
 









<div class="row">
	<div class="col-md-12">



		<div id="uploads-area">
			<!-- The file upload form used as target for the file upload widget -->
			<form id="fileupload" class="form-horizontal" action="/media/uploads/fileupload" method="POST" enctype="multipart/form-data">
				<div class="row">
					<!-- The global progress information -->
					<div class="span5 fileupload-progress fade">
						<!-- The global progress bar -->
						<div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
							<div class="bar" style="width: 0%;"></div>
						</div>
						<!-- The extended global progress information -->
						<div class="progress-extended">&nbsp;</div>
					</div>
					<!-- End The global progress information -->
				</div>
				<!-- Batch Actions -->
				<div class="well fileupload-buttonbar">


					<!-- The fileinput-button span is used to style the file input field as button -->
					<span class="btn btn-success fileinput-button">
						<i class="icon-plus icon-white"></i>
						<span>Add files...</span>
						<input type="file" name="files" multiple="">
					</span>
					<button type="submit" class="btn btn-primary start">
						<i class="icon-upload icon-white"></i> <span>Start uploads</span>
					</button>
					<button type="reset" class="btn cancel">
						<i class="icon-ban-circle icon"></i> <span>Cancel uploads</span>
					</button>


					<div id="bulkActions">
						<hr>

						<input id="toggleCheckAll" type="checkbox" class="toggle">

						<div class="btn-group">
							<a class="btn dropdown-toggle" data-toggle="dropdown" data-target="dropdown-menu"> <i class="icon icon-plus"></i> Bulk Action <span
								class="caret"></span> </a>
								<ul class="dropdown-menu" role="menu">
									<li><a id='btn-bulk-title'><i class="icon icon-font"></i> Title</a></li>
									<li><a id='btn-bulk-tags'><i class="icon icon-tags"></i> Tags</a></li>
									<li><a id='btn-bulk-description'><i class="icon icon-pencil"></i> Description</a></li>
								</ul>
								<a id="saveAll" class="btn btn-success">Save all</a>
							</div>

						</div>

						<div id="action-items" class="form-horizontal">
							<!--                            <div id="bulk-title" class="action-item"></div>-->
							<!--                            <div id="bulk-tags" class="action-item"></div>-->
							<!--                            <div id="bulk-description" class="action-item"></div>-->
						</div>
					</div>

					<!-- End Batch Actions -->


					<!-- The loading indicator is shown during file processing -->
					<div class="fileupload-loading"></div>
					<br>
					<!-- The table listing the files available for upload/download -->
					<table id="uploads-items" role="presentation" class="table">
						<tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody>
					</table>
				</form>
			</div>




		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-5">

			{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
			{{ link_to_route('assets', 'Cancel') }}
		</div>
	</div>
	


</form>









<!-- 
<form method="POST" action="{{action('Controllers\Admin\AssetsController@postUpload')}}" accept-charset="UTF-8" class="form-horizontal">
	<div class="form-body">
		<div class="row">
		 <div class="col-md-6">
			<div class="form-group">
			 <label class="control-label col-md-3">Title</label>
			 <div class="col-md-9">
				 {{ Form::text('title', '',  array('class' => 'form-control')) }}
			 </div>
		 </div>
	 </div>
	 <div class="col-md-6">
		<div class="form-group">
		 <label class="control-label col-md-3">Description</label>
		 <div class="col-md-9">
			 {{ Form::text('description', '',  array('class' => 'form-control')) }}
		 </div>
	 </div>
 </div>
</div>
<div class="row">
 <div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">File path</label>
	 <div class="col-md-9">
		 {{ Form::text('filepath', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
<div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">File name</label>
	 <div class="col-md-9">
		 {{ Form::text('filename', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">Transcoded URL</label>
	 <div class="col-md-9">
		 {{ Form::text('transcoded_url', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
<div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">Thumbnail URL</label>
	 <div class="col-md-9">
		 {{ Form::text('thumbnail_url', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">URL</label>
	 <div class="col-md-9">
		 {{ Form::text('url', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
<div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">Type</label>
	 <div class="col-md-9">
		 {{ Form::text('type', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
</div>
<div class="row">
 <div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">Status</label>
	 <div class="col-md-9">
		 {{ Form::text('status', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
<div class="col-md-6">
	<div class="form-group">
	 <label class="control-label col-md-3">Tags</label>
	 <div class="col-md-9">
		 {{ Form::text('tags', '',  array('class' => 'form-control')) }}
	 </div>
 </div>
</div>
</div>
</div>
<div class="row">
	<div class="col-md-offset-5">

		{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
		{{ link_to_route('assets', 'Cancel') }}
	</div>
</div>
</form>
-->



@stop