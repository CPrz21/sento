<!DOCTYPE html>
<html ng-app="SentoApp"><!-- indica al html Angular -->
<head>
	<title>Sento</title>
	<meta charset="utf-8">
	 <base href="/Sento/">

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
	<script src="<?php echo $libs_url; ?>angular/angular-translate.min.js"></script>
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
<style>
[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
display: none !important;
}
</style>
<body scroll ng-show="viewer" ng-cloak>
	<div ng-controller="NavBarController" id="sento-nav" ng-class="{'fixed-bottom':!navOnBottom, 'fixed-top':navOnBottom}" ng-controller="NavBarController">
		<div id="sento-nav-menu" class="w-100 d-flex">
			<div class="d-flex nav-divs">
				<!-- <a class="nav-opt" href="#">
					<img style="width: 10%;" src="<?php echo $assets_uri; ?>Images/general/logoSento.png" alt="">
				</a> -->
				<img alt="" ng-src="{{url}}assets/Images/sento_small.png" style="width: 15%;padding-right: 2%;">
				<!-- <a class="nav-opt" href="#" style="flex-basis: 5%;">
					<img alt="" src="http://localhost:8080/Sento/assets/Images/general/logoSento.png" style="width: 100%;">
				</a> -->
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a ng-click="ShowNav('her')">{{navBar[1].nombre}}</a></span>
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a ng-click="ShowNav('him')">{{navBar[3].nombre}}</a></span>
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a href="#">{{navBar[5].nombre}}</a></span>
				<a class="nav-opt" href="#{{navBar[7].url_en}}" du-smooth-scroll du-scrollspy>{{navBar[7].nombre}}</a>
				<a class="nav-opt" href="#{{navBar[8].url_en}}" du-smooth-scroll du-scrollspy>{{navBar[8].nombre}}</a>
				<a class="nav-opt" href="#{{navBar[9].url_en}}" du-smooth-scroll du-scrollspy>{{navBar[9].nombre}}</a>
				<a class="nav-opt" href="#{{navBar[10].url_en}}" du-smooth-scroll du-scrollspy>{{navBar[10].nombre}}</a>
			</div>
			<div class="d-flex nav-divs">
				<div class="d-flex h-50 w-100 justify-content-around">
					<i class="icon ion-ios-search-strong"></i>
					<button type="button" name="button">{{navBar[11].nombre}}</button>
					<button type="button" name="button">{{navBar[12].nombre}}(2)</button>
					<button type="button" name="button">{{navBar[13].nombre}}</button>
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
