@layout('template.default')

@section('content')

<div class="row content">
		<div class="eight columns">
			<h4 class="subheader">Dashboard</h4>
			
			@forelse ($data as $d)
			<div class="row">
				<div class="eight columns listings">		
				{{$d->created_at=date('M d')}} | {{HTML::link_to_route('detail',$d->title,array($d->id))}} 
				</div>
				<div class="four columns listings">
					{{HTML::link('job/'.$d->id .'/edit','edit',array( 'span class'=>'label normal round'))}} @if ($d->status==True) <span class="success label">Active</span> @else <span class="alert label">in-active</span> @endif
				</div>
			</div>
			@empty
			<div class="eight columns listings">	
				<p>You do not have any job post as yet. {{HTML::link_to_route('new','Create a Job')}}.</p>
			</div>
			@endforelse

	</div>
			
		</div>
	
@endsection