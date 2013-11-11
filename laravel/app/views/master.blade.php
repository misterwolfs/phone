<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Phinder</title>
	

	{{	HTML::style('resources/css/base.css') }}


	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head>
<body>
	@yield('title')

	<div id="table-wrapper">
	
		<nav id="main-nav" class="main-nav slideInLeft animated">
		<div class="scroll">
			@if (!empty($data))
				<section id="user-panel" class='logged-in'>
					<h1>Phinder</h1>
					<img src="{{ $data['photo'] }}" alt="{{{ $data['name']	}}}">
					<h2>Hi, {{{ $data['firstname']	}}}</h2>
					<div class="view-profile" id="user/info"><a href="#viewprofile" class="open-sidebar nav">View your profile</a></div>
				</section>
			@else
				<section id="user-panel" class='logged-out'>
					<h1>Phinder</h1>
					<button id="login">Login with facebook</button>
				</section>
			@endif

			<section id="navigation">
				<ul class="nav-parent">
					<li class="parent active"><a href="#find-a-phone" class="toggle-menu">Find a phone</a>
						<ul class="subnav">
							<li id="brand"><a class="open-sidebar nav" href="#bybrand">By brand</a></li>
							<li id="search-location"><a class="open-modal nav" href="#bylocation">By location</a></li>
							<li id="advanced"><a class="open-sidebar nav" href="#advanced-search">Advanded search</a></li>
							<li id="viewall"><a class="view-all nav" href="#view-all">View all</a></li>
						</ul>
					</li>
					@if(Auth::check())
					<li class="parent"><a href="#sell-a-phone" class="toggle-menu">Sell a phone</a>
						<ul class="subnav">
							<li id="addphone"><a class="open-sidebar nav" href="#add-phone">Add a phone</a></li>
							
							<li id="view-my-phone"><a class="open-sidebar nav" href="#view-my-phone">View my phones</a></li>
							
						</ul>
					</li>
					@else 
					<li class="parent no-sub"><a href="#howitworks" class="toggle-menu no-toggle nav">What is phinder</a></li>
					@endif
					<li class="parent" id="repair-a-hone"><a href="#repair-a-phone" class="toggle-menu">Repair a phone</a>
						<ul class="subnav">
							<li id="repaircafe"><a class="repair-cafe-all nav" href="#find-cafe">Find a repear café</a></li>
							<li id="nearyou"><a class="open-modal nav" href="#find-cafe-location">Repairder near you</a></li>
						</ul>
					</li>
				</ul>
			</section>

			</div>
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
			    <h1>Phinder</h1>
			</header>

			<section id="main" class="fadeIn animated">

				@if(Session::has('message'))
					<div class="modal-window bounceInDown animated" id="errorLogin">
						<div class="facebookwarning">
							<div class="close-modal"></div>
							<h3>Something went wrong</h3>

							<p>Something went wrong when connecting with facebook. 
							<br /> You have to give us access to your account to use this webapplication. So if you want to use our application please give us access to your account.</p>
							
							<button class="btn no-icon round green margin dismiss phone-added">Skip message</button>
						</div>
					</div>
				@endif
			
				 <div id="map"></div>
			</section>
		</div>

	</div>
	
	<input data-url="<?php echo public_path() ?>" id="base" type="hidden">

	<!--CDN scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpx1FOANjsAYRyGTXDYFGjSrwJ42R7-kA&amp;libraries=drawing,places&amp;sensor=false"></script>	

	<!--LOCAL scripts-->

	
	{{ HTML::script('resources/js/base.min.js') }}

</body>
</html>