var app = angular.module('SentoApp',['ngRoute','ngResource','ngAnimate', 'ngSanitize', 'ui.bootstrap','duScroll']);
app.config(function($routeProvider) {

    $routeProvider
    .when("/", {
      controller:"MainController",
      templateUrl:"App/templates/home.html"
    })
    // .when("/post/:id", {
    //   controller:"PostController",
    //   templateUrl:"App/templates/post.html"
    // })
    // .when("/posts/:id", {
    //   controller:"NewPostController",
    //   templateUrl:"App/templates/post_form.html"
    // })
    // .when("/posts/edit/:id", {
    //   controller:"EditPostController",
    //   templateUrl:"App/templates/post_form.html"
    // })

});
