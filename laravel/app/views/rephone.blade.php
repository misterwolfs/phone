<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Project</title>
	

	{{	HTML::style('resources/css/base.css') }}


	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
</head>
<body>

	<div id="table-wrapper">
	
		<nav id="main-nav" class="main-nav slideInLeft animated">

			<section id="user-panel" class="logged-out">
				<button  id="login" class="open-modal">Login with facebook</button>
			</section>

			<section id="navigation">
				<ul class="nav-parent">
					<li class="parent active"><a href="#find-a-phone">Find a phone</a>
						<ul class="subnav">
							<li>By brand</li>
							<li>By location</li>
							<li>Advanded search</li>
							<li>View all</li>
						</ul>
					</li>
					<li class="parent"><a href="#sell-a-phone">Sell a phone</a>
						<ul class="subnav">
							<li id="form">Add a phone</li>
						</ul>
					</li>
					<li class="parent"><a href="#repair-a-phone">Repair a phone</a>
						<ul class="subnav">
							<li>By brand</li>
							<li>By location</li>
							<li>Advanded search</li>
							<li>View all</li>
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
				 <div id="map"></div>
			</section>
		</div>

	</div>

	<!--CDN scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpx1FOANjsAYRyGTXDYFGjSrwJ42R7-kA&sensor=false"></script>
	<script src="http://platform.twitter.com/anywhere.js?id=[361899175-JL9rfQJwKw4VGsbpvgnoPUGESTDLKXgYA1jT8hzP]&amp;v=1"></script>

	<!--LOCAL scripts-->
	<!-- <script src="js/modernizer.js"></script>
	<script src="js/map.js"></script>
	<script src="js/callback.js"></script>
	<script src="js/navigation.js"></script>
	<script src="js/modalController.js"></script> 
	<script src="js/sidebarController.js"></script> -->
	
	{{ HTML::script('resources/js/base.min.js') }}

	<script>
		$(function() {
			mapController.initialize();
		})
	</script>

</body>
</html>