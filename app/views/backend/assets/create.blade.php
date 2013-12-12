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
        $('.typeahead').autocomplete({
            source: function(request, response){

                $.ajax({
                    url: "/v1/users",
                    data: {search: request.term, fields:'username,id'},
                    dataType: "json",
                    success: function( data ) {


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

        function showDropzone(){
            $(".btn-getUserInfo").text("got it")
            $("#uploads-area").removeClass('hide');

        }



		$('#owner').focus()
		.keypress(function(e){
			var code = e.keyCode || e.which;
			if(code == 13) { //Enter keycode
				e.preventDefault();
                showDropzone();
			}
		})
        .on('focus', function(){
                $(".btn-getUserInfo").text("Get Owner ID");
                $(this).val('');
                $("#uploads-area").addClass('hide');

                myDropzone.removeAllFiles();

            })

		$(".btn-getUserInfo").click(function(e){
			e.preventDefault();
            showDropzone();
		})

        function doComplete(){
            console.log('all complete')
        }

        var myDropzone;
        Dropzone.options.filedrop = {
            maxFilesize: 2048,
            init: function () {

                myDropzone = this;

                var totalFiles = 0,
                    completeFiles = 0;

                this.on("sending", function (file, xhr, formData) {
                    formData.append("userId", $("#owner").val());
                    console.log('sending', xhr)
                });
                this.on("addedfile", function (file, xhr, formData) {
                    totalFiles += 1;
                });

                this.on("error", function (file) {
                    if(file.status == "error"){
                        console.log("do something");
                    }
                });

                this.on("removed file", function (file, xhr, formData) {
                    totalFiles -= 1;
                });
                this.on("complete", function (file) {
                    completeFiles += 1;
                    if (completeFiles === totalFiles) {
                        doComplete();
                    }
                });
            }
        };









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


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <div class="lookUpUser">
                <label class="control-label col-md-3">Owner</label>
                <input id="owner" type="text" class="typeahead">
                <button  class="btn-getUserInfo btn btn-success">Get Owner ID</button>
            </div>
        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div id="uploads-area" class="hide">
            <form id="filedrop" action="/admin/assets/upload" class="dropzone">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
		</div>
    </div>
</div>
@stop