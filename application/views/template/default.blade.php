<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>MY Job Site</title>
  <!-- Included CSS Files (Compressed) -->
  

  {{HTML::style('css/foundation.min.css')}}
  {{HTML::style('css/general_enclosed_foundicons.css')}}    
  {{HTML::style('css/app.css')}}
  {{HTML::script('js/modernizr.foundation.js')}}
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
	<body>
			<div class='row'>  <!-- Start header -->
				<div class="three columns">
					<h1><img src="http://placehold.it/400x100&text=Logo" /></h1>
				</div>
				<div class='nine columns'>
					<ul class='nav-bar right'>
						<li>{{HTML::link_to_route('home', 'Home')}}</li>
						<li>{{HTML::link_to_route('new', 'Post A Job')}}</li>
						@if(Auth::check())
						<li>{{HTML::link_to_route('dashboard', 'Dashboard')}}</li>
						@else
						<li>{{HTML::link_to_route('register', 'Register')}}</li>
						@endif	
						@if(Auth::check())
						<li>{{HTML::link_to_route('logout', 'Logout')}}</li>
						@else
						<li>{{HTML::link_to_route('login', 'Login')}}</li>
						@endif
					</ul>
				</div>
			</div> <!-- End of header -->

			<div class='row content'> <!-- Start content area -->
					 @if(session::has('message'))
          				{{session::get('message')}} <br />
       				 @endif
					@yield('content')
			</div>

			<div class="row">
		      <footer class="twelve columns">
		          <ul class="link-list">
		           <li>{{HTML::link_to_route('home', 'Home')}}</li>
					<li>{{HTML::link_to_route('new', 'Post A Job')}}</li>

		          </ul> 
		      </footer> <!-- End of footer -->
		  </div>
	</body>
</html>