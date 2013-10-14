@extends('backend/layouts/default')

@section('content')


<h1>Edit Asset</h1>
    <form method="POST" action="{{url('update/asset', array($asset->id))}}" class="form-horizontal" >
        {{Form::token()}}

        <div class="form-body">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Title</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">Give your Asset a title</span> -->
                    </div>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group">
                 <label class="control-label col-md-3">Description</label>
                 <div class="col-md-9">
                     {{ Form::text('title', $asset->description,  array('class' => 'form-control')) }}
                    <!-- <span class="help-block">Describe your Asset</span> -->
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
     <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Filepath</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Filename</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
</div>
   <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Transcoded URL</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Thumbnail URL</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
</div>

   <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">URL</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Type</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
</div>
   <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Status</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Tags</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <!-- <span class="help-block">This is inline help</span> -->
                    </div>
                </div>
            </div>
</div>

   <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Views</label>
                     <div class="col-md-9 well">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{$asset->views}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Last Viewed</label>
                     <div class="col-md-9 well">
                          {{$asset->last_viewed}}
                    </div>
                </div>
            </div>
</div>

   <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Created At</label>
                     <div class="col-md-9 well">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                        {{$asset->created_at}}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Updated At</label>
                     <div class="col-md-9 well">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                      {{$asset->updated_at}}                       
                    </div>
                </div>
            </div>
</div>

<div class="row">
<div class="col-md-offset-5">
    
{{ Form::submit('Update', array('class' => 'btn-lg btn-info')) }}
  
   <button class="btn-lg btn-info" > {{ link_to_route('assets', 'Cancel') }}</button> 
</div>    

 
</div>
</form>


@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
