@layout('template.default')

@section('content')

<div class="row content">
	<div class="eight columns content">
		<div class="panel"><h3>{{$job->title}}</h3></div>

		<p>@{{$job->company}}</p>
		Posted {{$job->created_at = date("M d")}}
		<hr />
		<p >{{nl2br($job->detail)}}</p>
		<div class="panel"><h4 class="subheader">How to apply:</h4>{{nl2br($job->apply)}}</div>
		
		
	</div>
</div>
@endsection