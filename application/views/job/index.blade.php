@layout('template.default')

@section('content')
<div class="row intro">
	<div class="four columns">
		<h2>Local jobs for web & creative professionals..</h2>
	</div>

	

	<div class="eight columns">
		<h4>Find a Programmer</h4>
<p>
	Nyfreelancers.com is a job board with a declared goal of bringing together local
	companies and professionals who take interests in latest web technologies, 
	web standards and web design trends.  Post your job or freelance project now for free.
</p>
	</div>
</div>



	@foreach  ($jobs as $job)
	<div class="row content">
		<div class="twelve columns listings">
			<div class="row ">

				<div class="two columns">
					<h5><span class="radius success label">NEW</span></h5>
				</div>
					<div class="eight columns"> 
						<h5>{{HTML::link_to_route('detail',$job->title,$job->id)}}	<small>@ {{$job->company}}</small></h5>
						<cite>{{$job->location}}</cite>	 	
					</div>
					<div class="two columns">
						<h5><small>{{date('m/d',strtotime($job->created_at))}}</small></h5>
					</div>

			</div>
		</div>
	</div>

		@endforeach

@endsection