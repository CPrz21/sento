<!-- <!DOCTYPE html>
<html ng-app="MyFirstApp">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Angular :D</title>


    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

  </head>
  <body ng-controller="FirstController">
    <ul>
      <li ng-repeat="post in posts">
        <h2>{{post.title}}</h2>
        <p>{{post.body}}</p>
      </li>
    </ul>
  </body>
<script src="<?php echo $assets_uri; ?>js/index.js"></script>
</html> -->
<!DOCTYPE html>
<html ng-app="FinalApp"><!-- indica al html Angular -->
<head>
	<title>Posts App</title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/materialdesignicons.css">
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/lumx.css">
	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/main.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

	<link rel="stylesheet" href="<?php echo $assets_uri; ?>css/plugins/bootstrap/bootstrap.css">

	<!-- JQUERY -->
	<script src="<?php echo $libs_url; ?>jquery-3.3.1.min.js"></script>


	<script src="<?php echo $libs_url; ?>bootstrap/bootstrap.min.js"></script>

	<script src="<?php echo $libs_url; ?>velocity.min.js"></script>
	<script src="<?php echo $libs_url; ?>moment-with-locales.min.js"></script>

	<!-- ANGULAR 1.6.9 -->
	<script src="<?php echo $libs_url; ?>angular.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular-route.min.js"></script>
	<script src="<?php echo $libs_url; ?>angular-resource.min.js"></script>

	<script src="<?php echo $libs_url; ?>lumx.js"></script>
	<!-- SITE -->
	<script src="<?php echo $_url; ?>site.js"></script>

	<!-- ANGULAR CONTROLLERS -->
	<script src="<?php echo $_url; ?>app.js"></script>
	<script src="<?php echo $_url; ?>services.js"></script>
	<script src="<?php echo $_url; ?>controllers.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	<!-- <nav>
		<div class="bgc-blue-900 tc-white" flex-container="row" flex-align="center center">
			<div flex-item="4">
				<h1 class="fs-display-3 display-block">Posts App</h1>
			</div>
			<div flex-item="1">
				<a href="#!/">Inicio</a>
			</div>
			<div flex-item="1">
				<a href="#!/posts/new">Crear Post</a>
			</div>
		</div>
	</nav> -->
	<div flex-container="row" flex-align="center">
		<div ng-view flex-item="9"><!-- ng-view indica que sera el layout de las vistas -->
		</div>
	</div>


</body>
</html>
