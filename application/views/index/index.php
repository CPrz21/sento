<!DOCTYPE html>
<html ng-app="SentoApp"><!-- indica al html Angular -->
<head>
	<title>Sento</title>

	<!-- BOOTSTRAP 4 CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/bootstrap/bootstrap.css">

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
	<script src="<?php echo $_url; ?>controllers.js"></script>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" ng-controller="DropdownController as vm">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="nav-link" href="#her" du-smooth-scroll du-scrollspy>Her<span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#him" du-smooth-scroll du-scrollspy>Him</a>
	      </li>
				<li class="nav-item">
	        <a class="nav-link" href="#spa" du-smooth-scroll du-scrollspy>Spa</a>
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
	</nav>
	<div class="container-fluid">
		<div class="row" ng-view><!-- ng-view indica que sera el layout de las vistas -->
		</div>
	</div>


</body>
</html>
