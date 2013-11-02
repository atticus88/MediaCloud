@extends('backend/layouts/admin')

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
  <div class="form-body">
    <div class="row">
     <div class="col-md-6">
       <div class="form-group">
         <label class="control-label col-md-2">User</label>
         <div class="col-md-6">
           {{ Form::text('user', '',  array('class' => 'form-control')) }}
         </div>
       </div>
     </div>
     <div class="col-md-6">
      <div class="form-group">
       <label class="control-label col-md-3">Title</label>
       <div class="col-md-9">
         {{ Form::text('title', '',  array('class' => 'form-control')) }}
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