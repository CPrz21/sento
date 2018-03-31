
var app = angular.module("FinalApp",["lumx","ngRoute","ngResource"]);
app.config(function($routeProvider) {

    $routeProvider
    .when("/", {
      controller:"FirstController",
      templateUrl:"App/templates/home.html"
    })
    .when("/post/:id", {
      controller:"PostController",
      templateUrl:"App/templates/post.html"
    })
    .when("/posts/:id", {
      controller:"NewPostController",
      templateUrl:"App/templates/post_form.html"
    })
    .when("/posts/edit/:id", {
      controller:"EditPostController",
      templateUrl:"App/templates/post_form.html"
    })

});


// angular.module("FinalApp",["lumx","ngRoute","ngResource"])
//   .config(['$routeProvider','$locationProvider',function($routeProvider, $locationProvider) {
//     $locationProvider.hashPrefix('');
//     $routeProvider
//     .when("/", {
//       controller:"MainController",
//       templateUrl:"templates/home.html"
//     })
//     .when("/post/:id", {
//       controller:"PostController",
//       templateUrl:"templates/post.html"
//     })
//
//
// }]);
