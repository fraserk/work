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
					{{HTML::link_to_route('edit','EDIT',array($d->id))}} | Status: @if ($d->status==True) Active @else Close @endif
				</div>
			</div>
			@empty
			<div class="eight columns listings">	
				<p>You do not have any job post as yet. {{HTML::link_to_route('new','Create a Job')}}.</p>
			</div>
			@endforelse

	</div>
			<div class='four columns panel'>
				<h5>User Info:</h5>
				<p>Username: {{ Auth::user()->username}}</p>
				<p>Email: {{ Auth::user()->email}}</p>

			</div>
		</div>
	
@endsection