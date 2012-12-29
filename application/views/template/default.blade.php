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

 <meta content="Ny Freelancerss.com is a job board with a declared goal of bringing together companies and professionals who take interests in latest web technologies, web standards and web design trends." name="description" />
    <meta content="jobs,freelance,design,development,web design,web development,job board" name="keywords" />
  <title>NY freelancers | New York Freelancers and developers</title>



  <!-- Included CSS Files (Compressed) -->
  

  {{HTML::style('css/foundation.min.css')}}
  {{HTML::style('css/general_enclosed_foundicons.css')}}
  {{HTML::style('css/general_enclosed_foundicons_ie7.css')}}      
  {{HTML::style('css/app.css')}}
  <link href='http://fonts.googleapis.com/css?family=Happy+Monkey' rel='stylesheet' type='text/css'>
  
  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
	<body>
			<div class='row'>  <!-- Start header -->
				<div class="three columns">
					<h1>{{HTML::image('img/logo.png')}}</h1>
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
						<li>{{HTML::link_to_route('contact','Contact us')}}</li>
						@endif
					</ul>
				</div>
			</div> <!-- End of header -->

			
					 @if(session::has('message'))
					 <div class="row">
						 <div class="twelve columns alert-box alert">
          					{{session::get('message')}} <br />
          				</div>
          			</div>
       				 @endif
       		<div class=''> <!-- Start content area -->		 
					@yield('content')
					@yield('sidebar')
			</div>

			<div class="row footer">

		      <footer class="twelve columns">
		         <div class="row">
		         	<div class="four columns">
				          <ul class="four side-nav">
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
						<li>{{HTML::link_to_route('contact','Contact us')}}</li>
						@endif

				          </ul> 
		      		</div>

		      		<div class="four columns">
		      			
		      		</div>
		      		<div class="four columns">
		      			
		      		</div>
		      </div>
		      </footer> <!-- End of footer -->
		  </div>
		  {{HTML::script('js/modernizr.foundation.js')}}
		  <script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-128168-2']);
			  _gaq.push(['_trackPageview']);

			  (function() {
			    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

			</script>
		  
	</body>
</html>