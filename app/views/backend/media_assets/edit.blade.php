@extends('backend/layouts/default')

@section('content')


<h1>Edit Asset</h1>
    <form method="POST" action="{{url('update/asset', array($asset->id))}}" class="form-horizontal" >
        {{Form::token()}}

        <div class="form-body">
            <h3 class="form-section">Person Info</h3>
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label col-md-3">Title</label>
                     <div class="col-md-9">
                        <!-- <input type="text" class="form-control" placeholder="Chee Kin"> -->
                         {{ Form::text('title', $asset->title,  array('class' => 'form-control')) }}
                        <span class="help-block">This is inline help</span>
                    </div>
                </div>
            </div>
            <!--/span-->
            <div class="col-md-6">
              <div class="form-group has-error">
                 <label class="control-label col-md-3">Last Name</label>
                 <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Lim">
                    <span class="help-block">This field has error.</span>
                </div>
            </div>
        </div>
        <!--/span-->
    </div>
    <!--/row-->
</div>

<ul>
    <li class="lead">
        {{ Form::label('title', 'Title',  array('class' => 'label label-primary')) }}
        {{ Form::text('title', $asset->title,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('description', 'Description',  array('class' => 'label label-primary')) }}
        {{ Form::text('description', $asset->description,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('filepath', 'Filepath',  array('class' => 'label label-primary')) }}
        {{ Form::text('filepath', $asset->filepath,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('filename', 'Filename',  array('class' => 'label label-primary')) }}
        {{ Form::text('filename', $asset->filename,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('transcoded_url', 'Transcoded_url',  array('class' => 'label label-primary')) }}
        {{ Form::text('transcoded_url', $asset->transcoded_url,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('thumbnail_url', 'Thumbnail_url',  array('class' => 'label label-primary')) }}
        {{ Form::text('thumbnail_url', $asset->thumbnail_url,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('url', 'Url',  array('class' => 'label label-primary')) }}
        {{ Form::text('url', $asset->url,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('type', 'Type:',  array('class' => 'label label-primary')) }}
        {{ Form::text('type', $asset->type,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('status', 'Status',  array('class' => 'label label-primary')) }}
        {{ Form::text('status', $asset->status,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('tags', 'Tags',  array('class' => 'label label-primary')) }}
        {{ Form::text('tags', $asset->tags,  array('class' => 'pull-right')) }}
    </li>

    <li class="lead">
        {{ Form::label('last_viewed', 'Last_viewed',  array('class' => 'label label-primary')) }}

        {{$asset->last_viewed}}
    </li>

    <li class="lead">
        {{ Form::label('views', 'Views', array('class' => 'label label-primary')) }}
        {{$asset->last_viewed}}

    </li>

    <li class="lead">
        {{ Form::label('created_at', 'Created_at', array('class' => 'label label-primary')) }}
        {{$asset->last_viewed}}
    </li>

    <li class="lead">
        {{ Form::label('updated_at', 'Updated_at', array('class' => 'label label-primary')) }}
        {{$asset->last_viewed; array('class'=>'pull-left')}}
    </li>

    <li class="lead">
     {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
     {{ link_to_route('assets', 'Cancel', array('class' => 'btn btn-info')) }}
 </li>
</ul>

</form>


@if ($errors->any())
<ul>
  {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

@stop
