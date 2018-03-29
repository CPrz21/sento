var app = angular.module('MyFirstApp', []);
// app.controller('FirstController', function($scope, $http) {
//   $scope.posts = [];
//   $scope.newPost={};
//     $http({
//         method : "GET",
//         url : "https://reqres.in/api/users"
//     }).then(function mySuccess(data) {
//
//       console.log(data);
//       $scope.posts=data.data;
//     }, function myError(err) {
//
//     });
// });
var base_url = 'http://' + location.hostname + ':'+location.port+'/localPA/';

var _url = base_url + "AjaxPost/get_data_C/";

var app = angular.module('MyFirstApp', []);
app.controller('FirstController', function($scope, $http) {
  $scope.posts = [];
    $http({
        method : "GET",
        url : _url
    }).then(function mySuccess(data) {

      console.log(data);
      //$scope.posts=data.data;
    }, function myError(err) {

    });
});


// var app = angular.module('MyFirstApp', []);
// app.controller('FirstController', function($scope, $http) {
//   $scope.posts = [];
//     $http.get("http://jsonplaceholder.typicode.com/posts/")
//     .then(function (response) {
//       console.log(data);
//       $scope.posts=data;
//     });
// });
