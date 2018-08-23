var app = angular.module('SentoApp',['ngRoute','ngResource','ngAnimate','ngTouch','masonry','ngSanitize', 'ui.bootstrap','duScroll','ngDropdowns','ngSidebarJS',"pathgather.popeye"]);
function AppCtrl(SidebarJS) {
  this.toggleSidebarJS = function toggleSidebarJS(sidebarName) {
    SidebarJS.toggle(sidebarName);
  };

  this.isVisibleSidebarJS = function isVisibleSidebarJS(sidebarName) {
    return SidebarJS.isVisible(sidebarName);
  };

  this.onSidebarOpen = function onSidebarOpen() {
    console.log('is open!');
  };

  this.onSidebarClose = function onSidebarClose() {
    console.log('is close!');
  };

  this.onSidebarChangeVisibility = function onSidebarChangeVisibility(event) {
    console.log(event);
  };
}
app.component('app', {
    controller: ['SidebarJS', AppCtrl],
    controllerAs: 'app'
  });
// app.config(function($routeProvider, $locationProvider) {
//
//
//     $routeProvider
//     .when("/En/Home", {
//       controller:"MainController",
//       templateUrl:"App/templates/sento_sections/Home.html"
//     })
//     // .when("/En", {
//     //   controller:"MainController",
//     //   templateUrl:"App/templates/home.html"
//     // })
//     .otherwise({
//         redirectTo: '/En/Home'
//     })
//     // use the HTML5 History API
//         $locationProvider.html5Mode(true);
//
//
// });
