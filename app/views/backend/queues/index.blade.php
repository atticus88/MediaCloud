@extends('backend/layouts/admin')

@section('content')
{{Breadcrumbs::render('queues')}}

<iframe src="/beanstalkd/public/index.php" width="100%" height="500px"></iframe>


@stop

