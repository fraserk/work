@layout('template.default')

@section('content')
	<div class="eight columns">
<h2>Welcome,{{Auth::user()->email}} </h2>
		
		@foreach ($data as $d)
		<div class="row">
			<div class="eight columns listings">		
			{{$d->created_at=date('M d')}} | {{$d->title}} 
			</div>
			<div class="four columns listings">
				{{HTML::link_to_route('edit','EDIT',array($d->id))}} | VIEW
			</div>
		</div>
		@endforeach
	</div>
@endsection