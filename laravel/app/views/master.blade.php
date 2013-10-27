<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Project</title>
	

	{{	HTML::style('resources/css/base.css') }}


	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head>
<body>
	@yield('title')

	<div id="table-wrapper">
	
		<nav id="main-nav" class="main-nav slideInLeft animated">

			@if (!empty($data))
				<section id="user-panel" class='logged-in'>
					
					<img src="{{ $data['photo'] }}" alt="{{{ $data['name']	}}}">
					<h2>Hi, {{{ $data['firstname']	}}}</h2>
					<div class="view-profile" id="user/info"><a href="#viewprofile">View your profile</a></div>
				</section>
			@else
				<section id="user-panel" class='logged-out'>
					<button  id="login">Login with facebook</button>
				</section>
				
			@endif
			
			

			<section id="navigation">
				<ul class="nav-parent">
					<li class="parent active"><a href="#find-a-phone" class="toggle-menu">Find a phone</a>
						<ul class="subnav">
							<li id="brand"><a href="#bybrand">By brand</a></li>
							<li id="location"><a href="#bylocation">By location</a></li>
							<li id="advanded"><a href="#advanced-search">Advanded search</a></li>
							<li id="view-all"><a href="#view-all">View all</a></li>
						</ul>
					</li>
					<li class="parent"><a href="#sell-a-phone" class="toggle-menu">Sell a phone</a>
						<ul class="subnav">
							<li id="form"><a href="#add_phone">Add a phone</a></li>
						</ul>
					</li>
					<li class="parent"><a href="#repair-a-phone" class="toggle-menu">Repair a phone</a>
						<ul class="subnav">
							<li>nothing here yet</li>
						</ul>
					</li>
				</ul>
			</section>

			<section id="social">
				<button id="facebook"></button>
				<button id="twitter">Spread the love</button>
			</section>
		</nav>

		<div class="page-wrap">
	
			<header class="slideInDown animated">
				<div id="hamburger">
				    <a href="#main-nav" class="open-menu">
				      ☰
				    </a>
				    <a href="#" class="close-menu">
				      ☰
			    </a>		
				</div>
			    <h1>OURNAME</h1>
			</header>

			<section id="main" class="fadeIn animated">

				@if(Session::has('message'))
					<div class="modal-window bounceInDown animated" id="errorLogin">
						<div class="close-modal"></div>
						{{	Session::get('message')	}}
					</div>
				@endif
			
				 <div id="map"></div>
			</section>
		</div>

	</div>
	
	<input data-url="<?php echo public_path() ?>" id="base" type="hidden">

	<!--CDN scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpx1FOANjsAYRyGTXDYFGjSrwJ42R7-kA&sensor=false"></script>
	<script src="http://platform.twitter.com/anywhere.js?id=[361899175-JL9rfQJwKw4VGsbpvgnoPUGESTDLKXgYA1jT8hzP]&amp;v=1"></script>

	<!--LOCAL scripts-->
	{{ HTML::script('resources/js/modernizer.js') }}
	{{ HTML::script('resources/js/callback.js') }}
	{{ HTML::script('resources/js/navigation.js') }}
	{{ HTML::script('resources/js/modalController.js') }}
	{{ HTML::script('resources/js/sidebarController.js') }}
	{{ HTML::script('resources/js/mapController.js') }}
	{{ HTML::script('resources/js/custom.js') }}

	
	<!-- {{ HTML::script('resources/js/base.min.js') }} -->

</body>
</html>