<!DOCTYPE html>
<html ng-app="SentoApp"><!-- indica al html Angular -->
<head>
	<title>Sento</title>

	<!-- SENTO STYLE CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/SentoStyle.css">

	<!-- BOOTSTRAP 4 CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/bootstrap/bootstrap.css">

	<!-- IONICONS CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/ionicons/css/ionicons.css">

	<!-- JQUERY 3.3.1 -->
	<script src="<?php echo $libs_url; ?>jquery/jquery-3.3.1.min.js"></script>

	<!-- ANGULAR 1.6.9 -->
	<script src="<?php echo $libs_url; ?>angular/angular.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-route.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-resource.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-animate.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-sanitize.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-scroll.min.js"></script>
	<script src="<?php echo $libs_url; ?>ui_bootstrap/ui-bootstrap-tpls-3.0.3.min.js"></script>

	<!-- SITE -->
	<script src="<?php echo $_url; ?>site.js"></script>

	<!-- ANGULAR CONTROLLERS -->
	<script src="<?php echo $_url; ?>app.js"></script>
	<script src="<?php echo $_url; ?>services.js"></script>
	<script src="<?php echo $_url; ?>functions.js"></script>
	<script src="<?php echo $_url; ?>controllers.js"></script>
	<script src="<?php echo $_url; ?>directives.js"></script>
	<script src="<?php echo $_url; ?>filters.js"></script>

	<!-- GOOGLE MAPS API-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn2suJBTqWGl-K-S_8ujOix9HZwW8kIT4"></script>
</head>
<body scroll>
	<div id="sento-nav" ng-class="{'fixed-top':!navOnBottom, 'fixed-bottom':navOnBottom}" ng-controller="NavBarController">
		<div id="sento-nav-menu" class="w-100 d-flex">
			<div class="d-flex nav-divs">
				<!-- <a class="nav-opt" href="#">
					<img style="width: 10%;" src="<?php echo $assets_uri; ?>Images/general/logoSento.png" alt="">
				</a> -->
				<a class="nav-opt" ng-click="toTheTop()">Sento</a>
				<!-- <a class="nav-opt" href="#" style="flex-basis: 5%;">
					<img alt="" src="http://localhost:8080/Sento/assets/Images/general/logoSento.png" style="width: 100%;">
				</a> -->
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a ng-click="ShowNav('her')">Her</a></span>
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a ng-click="ShowNav('him')">Him</a></span>
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a href="#">Spa</a></span>
				<a class="nav-opt" href="#special_gifts" du-smooth-scroll du-scrollspy>Special Gifts</a>
				<a class="nav-opt" href="#seasons_gifts" du-smooth-scroll du-scrollspy>Season's Special</a>
				<a class="nav-opt" href="#gallery" du-smooth-scroll du-scrollspy>Gallery</a>
				<a class="nav-opt" href="#contactus" du-smooth-scroll du-scrollspy>Contact Us</a>
			</div>
			<div class="d-flex nav-divs">
				<div class="d-flex h-50 w-100 justify-content-around">
					<i class="icon ion-ios-search-strong"></i>
					<button type="button" name="button">LOGIN</button>
					<button type="button" name="button">SHOPPING BAG(2)</button>
					<button type="button" name="button">BOOK YOUR<br>SENTO EXPERIENCE</button>
				</div>
			</div>

		</div>
		<div id="sento-nav-submenu">
			<p ng-show="himM">him</p>
			<p ng-show="herM">her</p>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row" ng-view><!-- ng-view indica que sera el layout de las vistas -->
		</div>
	</div>
</body>
</html>
