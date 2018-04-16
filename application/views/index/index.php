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
<body>
	<div id="sento-nav" class="fixed-top" ng-controller="NavBarController">
		<div id="sento-nav-menu" class="w-100 d-flex">
			<div class="d-flex nav-divs">
				<!-- <a class="nav-opt" href="#">
					<img style="width: 10%;" src="<?php echo $assets_uri; ?>Images/general/logoSento.png" alt="">
				</a> -->
				<a class="nav-opt" ng-click="ShowNav()">Sento</a>
				<!-- <a class="nav-opt" href="#" style="flex-basis: 5%;">
					<img alt="" src="http://localhost:8080/Sento/assets/Images/general/logoSento.png" style="width: 100%;">
				</a> -->
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a href="#">Her</a></span>
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a href="#">Him</a></span>
				<span class="nav-opt"><i class="icon ion-ios-arrow-down"></i><a href="#">Spa</a></span>
				<a class="nav-opt" href="#">Special Gifts</a>
				<a class="nav-opt" href="#">Season's Special</a>
				<a class="nav-opt" href="#">Gallery</a>
				<a class="nav-opt" href="#">Contact Us</a>
			</div>
			<div class="d-flex nav-divs">
				<div class="d-flex h-50 w-100 justify-content-around">
					<i class="icon ion-ios-search-strong"></i>
					<button type="button" name="button">LOGIN</button>
					<button type="button" name="button">SHOPPING BAG(2)</button>
					<button type="button" name="button">BOOK YOUR<br>SENTO EXPERIENCE</button>
				</div>
			</div>

	<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" ng-controller="DropdownController as vm">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="#her_optns" du-smooth-scroll du-scrollspy>Her</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#him_optns" du-smooth-scroll du-scrollspy>Him</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#spa_optns" du-smooth-scroll du-scrollspy>Spa</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#special_gifts" du-smooth-scroll du-scrollspy>Special Gifts</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#seasons_gifts" du-smooth-scroll du-scrollspy>Season´s Gifts</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#gallery" du-smooth-scroll du-scrollspy>Gallery</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#contactus" du-smooth-scroll du-scrollspy>Contact Us</a>
	      </li>
	      <li class="nav-item dropdown" uib-dropdown>
	        <a class="nav-link dropdown-toggle" href="#" uib-dropdown-toggle data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          Dropdown<span class="caret"></span>
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown"  uib-dropdown-menu>
	          <a class="dropdown-item" href="#">Action</a>
	          <a class="dropdown-item" href="#">Another action</a>
	          <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="#">Something else here</a>
	        </div>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#">Disabled</a>
	      </li>
	    </ul>
	    <form class="form-inline my-2 my-lg-0 ng-pristine ng-valid">
	      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	    </form>
	  </div>
	</nav> -->
		</div>
		<div id="sento-nav-submenu">

		</div>
	</div>
	<div class="container-fluid">
		<div class="row" ng-view><!-- ng-view indica que sera el layout de las vistas -->
		</div>
	</div>
</body>
</html>
