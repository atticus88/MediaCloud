@extends('backend/layouts/admin')

@section('content')

{{Breadcrumbs::render('createAsset')}}
<div class="page-header">    
<h1>
Create Asset

<div class="pull-right">
    <a href="{{ route('assets') }}" class="btn btn-small btn-inverse"><i class="icon-circle-arrow-left icon-white"></i> Back</a>
</div>
</h1>
</div>

<form method="POST" action="{{action('Controllers\Admin\AssetsController@postCreate')}}" accept-charset="UTF-8" class="form-horizontal">
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
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label col-md-3">Description</label>
                 <div class="col-md-9">
                     {{ Form::text('description', '',  array('class' => 'form-control')) }}
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
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




@stop