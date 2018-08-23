<!DOCTYPE html>
<html ng-app="SentoApp"><!-- indica al html Angular -->
<head>
	<title>Sento</title>
	<meta charset="utf-8">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	 <base href="/Sento/">


  <!-- ANGULAR LIBS STYLES-->
  <link rel="stylesheet" href="<?php echo $assets_uri; ?>css/angular_libs/angular-dropdowns.css">
  <link rel="stylesheet" href="<?php echo $assets_uri; ?>css/angular_libs/angular-sidebarjs.min.css">
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/angular_libs/popeye.min.css">

	<!-- IONICONS CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/ionicons/css/ionicons.css">

	<!-- SLICK CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/slick/slick.css">
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/slick/slick-theme.css">

	<!-- SENTO STYLE CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/SentoStyle.css">

	<!-- BOOTSTRAP 4 CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/bootstrap/bootstrap.css">

	<!-- JQUERY 3.3.1 -->
	<script src="<?php echo $libs_url; ?>jquery/jquery-3.3.1.min.js"></script>


	<!-- JQUERY MIGRATE -->
	<script src="<?php echo $libs_url; ?>jquery/jquery-migrate-1.4.1.min.js"></script>

	<!-- SLICK -->
	<script src="<?php echo $libs_url; ?>slick/slick.min.js"></script>

	<!-- ANGULAR 1.6.9 -->
	<script src="<?php echo $libs_url; ?>angular/angular.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-route.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-resource.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-animate.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-translate.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-sanitize.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-scroll.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular/angular-touch.min.js"></script>
		<script src="<?php echo $libs_url; ?>angular/angular-masonry-directive.js"></script>
  	<script src="<?php echo $libs_url; ?>angular/angular-dropdowns.js"></script>
		<script src="<?php echo $libs_url; ?>angular/angular-sidebarjs.js"></script>
	<script src="<?php echo $libs_url; ?>ui_bootstrap/ui-bootstrap-tpls-3.0.3.min.js"></script>
	<script src="<?php echo $libs_url; ?>popeye/popeye.min.js"></script>


	<!-- SITE -->
	<script src="<?php echo $_url; ?>site.js"></script>

	<!-- ANGULAR CONTROLLERS -->
	<script src="<?php echo $_url; ?>app.js"></script>
	<script src="<?php echo $_url; ?>services.js"></script>
	<script src="<?php echo $_url; ?>functions.js"></script>
	<script src="<?php echo $_url; ?>controllers.js"></script>
	<script src="<?php echo $_url; ?>directives.js"></script>
	<script src="<?php echo $_url; ?>filters.js"></script>
	<script src="<?php echo $_url; ?>SentoGallery.js"></script>

	<!-- GOOGLE MAPS API-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn2suJBTqWGl-K-S_8ujOix9HZwW8kIT4"></script>
</head>
<style>
[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
display: none !important;
}
</style>
<body ng-controller="NavBarController" scroll ng-cloak>
	<nav id="sento-nav" class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<button class="navbar-toggler" type="button" ng-click="navSlide()">
	    <!-- <span class="navbar-toggler-icon"></span> -->
			<i class="icon ion-navicon"></i>
	  </button>
		<a class="nav-btns nav-item nav-link lgn-sen">
			<select ng-options="i.name for i in idiomas"
   		ng-model="selectedopt" ng-change="update()"></select>
		</a>
		<a class="navbar-brand" href="{{url}}">
			<img alt="" ng-src="{{url}}assets/Images/sento_small.png" style="width: 120px;">
		</a>
		<a class="nav-btns nav-item nav-link lgn-sen" href="#">LOGIN</a>
	  <div class="navbar-collapse" id="slide" ng-swipe-left="navSlide()">
	    <div class="navbar-nav">
				<button style="position: absolute;right: 0px;top: 0px;" class="navbar-toggler" type="button" ng-click="navSlide()">
					<i style="font-size: 40px;" class="icon ion-ios-close-empty"></i>
				</button>
				<a class="nav-item navbar-brand" href="#">
					<img alt="" ng-src="{{url}}assets/Images/sento_small.png" style="width: 120px;">
				</a>
	      <a value="Toggle First= {{box1}}" ng-click="box1=!box1" class="nav-item nav-link" >
					<i class="icon ion-ios-arrow-down"></i>{{navBar[1].nombre}}
					<div class="box1 box-optns" data-slide-toggle="box1" data-slide-toggle-duration="1000">
					  <div class="col-md-8">
					  	<p ng-repeat="optns in herOptions" ng-click="redirect(navBar[1].url+'?'+optns.nombre | rSpace)">{{optns.nombre | capitalize}}</p>
					  </div>
					</div>
				</a>
	      <a value="Toggle Second= {{box2}}" ng-click="box2=!box2" class="nav-item nav-link">
					<i class="icon ion-ios-arrow-down"></i>{{navBar[3].nombre}}
					<div class="box2 box-optns" data-slide-toggle="box2" data-slide-toggle-duration="1000">
						<div class="col-md-8">
					  	<!-- <p ng-repeat="optnis in himOptions">{{optnis.nombre}}</p> -->
							<p ng-repeat="optns in himOptions" ng-click="redirect(navBar[3].url+'?'+optns.nombre | rSpace)">{{optns.nombre | capitalize}}</p>
					  </div>
					</div>
				</a>
	      <a value="Toggle Third= {{box3}}" ng-click="box3=!box3" class="nav-item nav-link">
					<i class="icon ion-ios-arrow-down"></i>{{navBar[5].nombre}}
					<div class="box3 box-optns" data-slide-toggle="box3" data-slide-toggle-duration="1000">
						<div class="col-md-8">
					  	<!-- <p ng-repeat="optns in spaOptions">{{optns.nombre}}</p> -->
							<p ng-repeat="optns in spaOptions" ng-click="redirect(navBar[5].url+'?'+optns.nombre | rSpace)">{{optns.nombre | capitalize}}</p>
					  </div>
					</div>
				</a>
	      <a class="nav-item nav-link" href="{{navBar[7].url}}">{{navBar[7].nombre}}</a>
				<a class="nav-item nav-link" href="{{navBar[8].url}}">{{navBar[8].nombre}}</a>
				<a class="nav-item nav-link" href="{{navBar[9].url}}">{{navBar[9].nombre}}</a>
				<a class="nav-item nav-link" href="{{navBar[10].url}}">{{navBar[10].nombre}}</a>
				<i class="nav-item nav-link icon ion-ios-search search-sento"></i>
				<a class="nav-btns nav-item nav-link lgn-sento" ng-click="loginModal()">{{navBar[11].nombre}}</a>
				<a class="nav-btns nav-item nav-link shp-sento" sidebarjs-toggle>{{navBar[12].nombre}}(2)</a>
				<a class="nav-btns nav-item nav-link bk-sento" ng-click="viewSlide('mySecondSidebarJS')">BOOK YOUR<br>SENTO EXPERIENCE</a>
	    </div>
	  </div>
	</nav>

	<div dropdown-select="ddSelectOptions"
			dropdown-model="ddSelectSelected"
			dropdown-item-label="text">
	</div>

	<sidebarjs  sidebarjs-config="{position: 'right',nativeSwipe: false,nativeSwipeOpen: true}">
		<div id="shop-container" class="h-100 bg-light">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p>SHOPPING BAG (2)</p><i class="icon ion-ios-close-empty" sidebarjs-toggle></i>
					</div>
				</div>
				<div class="row">
					<div class="w-100">
						<div class="col-md-12 items-sidebar">
							<div>
								<i class="icon ion-ios-close-empty"></i>
							</div>
							<div>
								<p>Blow Hair x 2</p>
								<p><b>Price:</b> US $40</p>
							</div>
						</div>
						<div class="col-md-12 items-sidebar">
							<div>
								<i class="icon ion-ios-close-empty"></i>
							</div>
							<div>
								<p>Make up x 1</p>
								<p><b>Price:</b> US $20</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><b>Total:</b> US $60</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p>Proceed to checkout</p>
						<p>&lt; Continue Shopping</p>
					</div>
				</div>
			</div>
		</div>
  </sidebarjs>

	<sidebarjs class="nl-clss" sidebarjs-name="mySecondSidebarJS" sidebarjs-config="{position: 'left',nativeSwipe: false,nativeSwipeOpen: true}">
		<div class="container-fluid h-100">
			<div class="row d-flex align-items-center h-100">
				<div class="row col-9 mx-auto">
					<div class="col-6 bg-dark">
						<h1>asdsad</h1>
					</div>
					<div class="col-6 bg-white py-5">
						<div class="col-10 mx-auto text-center snto-border-container">
							<h2 class="snto-title mb-3 mt-4">THANK YOU</h2>
							<p class="snto-text mb-2"><b>JOIN OUR NEWSLETTER</b></p>
							<p class="snto-text mb-4">Thank you for subscribing to our email</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</sidebarjs>
  <div id="load" ng-hide="viewer">
    <div class="col-md-12 d-flex align-items-center justify-content-center h-100">
      <!-- <img ng-src="{{url}}assets/img/Double_Ring.svg"> -->
    </div>
  </div>
	<!-- <div class="popeye-modal-container">
	  <div class="popeye-modal">
	    <a class="popeye-close-modal" href ng-click="closeModal()"></a>

	  </div>
	</div> -->
