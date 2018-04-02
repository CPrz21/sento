app.controller('MainController', function($scope,$http,$resource,PostResource,$document) {
  $scope.isNavCollapsed = true;
  $scope.isCollapsed = false;
  $scope.isCollapsedHorizontal = false;
  $scope.toTheTop = function() {
    $document.scrollTopAnimated(0, 5000).then(function() {
      console && console.log('You just scrolled to the top!');
    });
  }


}).value('duScrollOffset', 0)
.controller('DropdownController', DropdownController);

function DropdownController() {
  var vm = this;

  vm.isCollapsed = true;
  vm.status = {
    isopen: false
  }
}

// .controller("MainController",function($scope,$resource,PostResource){
//   User = $resource("http://jsonplaceholder.typicode.com/users/:id", {id:"@id"});
//
//   $scope.posts= PostResource.query();
//   $scope.users= User.query();
//   $scope.removePost = function(post){
//     PostResource.delete({id: post.id}, function(data){
//       console.log(data);
//     });
//     $scope.posts = $scope.posts.filter(function(element){
//       return element.id !== post.id;
//     });
//   }
// //query() => espera que la respuesta sea un array de datos -> isArray=true
//
// })
// .controller("PostController",function($scope,$http,$location){
//     url = $location.absUrl().split("/").pop();
//     $scope.posts;
//     $scope.title = "Editar Post";
//     $http({
//         method : "POST",
//         url : base_url + "AjaxPost/getPostC/"+ url
//     }).then(function mySuccess(response) {
//       $scope.posts=response.data.data[0];
//       console.log(response.data.data);
//
//     }, function myError(err) {
//     });
//
//
// })
// .controller("EditPostController",function($scope,$http,$location){
//     url = $location.absUrl().split("/").pop();
//     $scope.post={};
//     $scope.title = "Editar Post";
//     $http({
//         method : "POST",
//         url : base_url + "AjaxPost/getPostC/"+ url
//     }).then(function mySuccess(response) {
//       $scope.post=response.data.data[0];
//       console.log(response.data.data[0]);
//
//     }, function myError(err) {
//     });
//
//     $scope.savePost=function(){
//       $http({
//           method : "POST",
//           url : base_url + "AjaxPost/editPostC/",
//           data : "title="+$scope.post.title+"&body="+$scope.post.body+"&idPost="+$scope.post.id,
//           headers: {'Content-Type': 'application/x-www-form-urlencoded'}
//       }).then(function mySuccess(response) {
//         if (response.data.status=="OK") {
//           $location.path("/");
//         }
//         console.log(response.data);
//         //$location.path("/");
//
//       }, function myError(err) {
//       });
//     }
//
// })
// .controller("PostController2",function($scope,PostResource,$routeParams,$location){
//   $scope.title = "Editar Post";
//   $http({
//       method : "POST",
//       url : base_url + "AjaxPost/getPostC/"+ url
//   }).then(function mySuccess(response) {
//     $scope.posts=response.data.data[0];
//     console.log(response.data.data);
//
//   }, function myError(err) {
//   });
//   //get() => a diferencia de query() este no espera un array sino que solo un objeto JSON
// })
// .controller("NewPostController",function($scope,$http,$location){
//
//   $scope.post = {};
//   $scope.title = "Crear post";
//
//   $scope.savePost = function(){
//     console.log($scope.post.body);
//     data={"title":$scope.post.title,"body":$scope.post.body}
//     $http({
//         method : "POST",
//         url : base_url + "AjaxPost/insertPostC/",
//         data : "title="+$scope.post.title+"&body="+$scope.post.body,
//         headers: {'Content-Type': 'application/x-www-form-urlencoded'}
//     }).then(function mySuccess(response) {
//       if (response.data.status=="OK") {
//         $location.path("/");
//       }
//
//     }, function myError(err) {
//     });
//
//   }
//
// })
// .controller("NewPostController2",function($scope,PostResource,$location){
//
//   $scope.post = {};
//   $scope.title = "Crear post";
//   $scope.savePost = function(){
//     PostResource.save({data:$scope.post},function(data){
//       console.log(data);
//       $location.path("/");
//     });
//   }
//
// });
