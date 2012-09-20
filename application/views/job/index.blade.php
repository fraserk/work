@layout('template.default')


@section('content')
<div class="eight columns">
	<h4>Current Listings</h4>
</div>

<div class="four columns">
	<span class="large button secondary">{{HTML::link_to_route('new','Post a job: $400 for 30 days')}}</span>
</div>
@foreach  ($jobs as $job)

<div class="twelve columns listings">

<span class="radius success label">NEW</span>	<strong>{{$job->location}}</strong>	 {{HTML::link_to_route('detail',$job->title,$job->id)}}	@ {{$job->company}}	
</div>

	@endforeach
@endsection