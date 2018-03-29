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
	<link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>css/materialdesignicons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>css/lumx.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $assets_uri; ?>css/main.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/2.0.2/velocity.min.js"></script>
	<script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://code.angularjs.org/1.6.9/angular-route.min.js"></script>
	<script src="https://code.angularjs.org/1.6.9/angular-resource.min.js"></script>
	<script src="<?php echo $assets_uri; ?>js/lumx.js"></script>
	<script src="<?php echo $assets_uri; ?>js/app.js"></script>
	<script src="<?php echo $assets_uri; ?>js/services.js"></script>
	<script src="<?php echo $assets_uri; ?>js/controllers.js"></script>
</head>
<body>
	<nav>
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
	</nav>
	<div flex-container="row" flex-align="center">
		<div ng-view flex-item="9"><!-- ng-view indica que sera el layout de las vistas -->
		</div>
	</div>


</body>
</html>
