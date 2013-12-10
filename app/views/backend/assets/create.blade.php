@extends('backend/layouts/admin')

@section('scripts')
<!-- <script src="//cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js" type="text/javascript"></script> -->

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
                    url: "/v1/users",
                    data: {search: request.term, fields:'username,id,email'},
                    dataType: "json",
                    success: function( data ) {
                        console.log(data);

                        response( $.map( data, function( item ) {
                            return {
                                label: item.username,
                                value: item.id
                            }
                        }));
                    }
                });
            }
        });

//		$('#owner').focus()
//		.keypress(function(e){
//			var code = e.keyCode || e.which;
//			if(code == 13) { //Enter keycode
//				e.preventDefault();
//			}
//		})
//
//		$(".btn-getUserInfo").click(function(e){
//			e.preventDefault();
//		})

//		$myDropZone = $("#myDropZone").dropzone({url: "/admin/assets/upload"});
//		$myDropZone.on('sending',function(file){
//			console.log(file, $("#owner").val());
//		})
		
	});
 </script>
@stop

@section('css')
<!--   <link href="/assets/css/typeahead.css" rel="stylesheet" type="text/css"/>-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <link href="//cdnjs.cloudflare.com/ajax/libs/dropzone/3.7.1/css/dropzone.css" rel="stylesheet" type="text/css"/>
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


<div class="row">
	<div class="col-md-12">
		<div id="uploads-area">
			<!-- The file upload form used as target for the file upload widget -->
			<form method="POST" action="/admin/assets/upload" class="dropzone" id="myDropZone">
				
			</form>
			</div>
		</div>
	</div>














@stop