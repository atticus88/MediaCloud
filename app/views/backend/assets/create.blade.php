@extends('backend/layouts/admin')

@section('scripts')
<script src="//cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js" type="text/javascript"></script>

<script src="/assets/js/dropzone.js"></script>

<script>
// $(document).ready(function($){
// 	$(".lookUpUser").lookUpUser('/allusers', getUserInfo);
// 	$('#owner').focus()
// });


	$( document ).ready(function( $ ) {
//		$('.typeahead').typeahead({
//			prefetch: '/allusers'
//		});

        $('.typeahead').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "/api/v1/url"
                })
            }
        })

		$('#owner').focus()
		.keypress(function(e){
			var code = e.keyCode || e.which;
			if(code == 13) { //Enter keycode
				e.preventDefault();
			}
		})

		$(".btn-getUserInfo").click(function(e){
			e.preventDefault();
		})

		$("#my-dropzone").dropzone({ url: "/admin/assets/upload" });
		
	});
 </script>
@stop

@section('css')
   <link href="/assets/css/typeahead.css" rel="stylesheet" type="text/css"/>
   <link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/3.7.1/css/basic.css" rel="stylesheet" type="text/css"/>
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


<form method="POST" action="{{action('AssetsController@store')}}" accept-charset="UTF-8" class="form-horizontal">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<div class="lookUpUser">
					<label class="control-label col-md-3">Owner</label>
					<input id="owner" type="text" class="typeahead">
					<button  class="btn-getUserInfo btn btn-success">GO</button>
				</div>
			</div>
		</div>
		<div id="#asset-orgainizer-container" class="col-md-8">
		</div>
	</div>
</form>


	<!-- <div class="asset-orgainizer">
			<div class="asset-container">
				<div class="toolbar">
					<input type="checkbox">
					<input type="text" placeholder="filter">
				</div>
				<div class="asset-list">
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
				</div>
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
		</div> -->






<div class="row">
	<div class="col-md-12">
		<div id="uploads-area">
			<!-- The file upload form used as target for the file upload widget -->
			<form method="POST" action="/admin/assets/upload" class="dropzone" id="my-dropzone">
				
			</form>
			</div>
		</div>
	</div>














@stop