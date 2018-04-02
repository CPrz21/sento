//angular.module("SentoApp")
// .factory("PostResource" function($resource){
//   return $resource(base_url + "AjaxPost/get_data_C/", {null});
// })




app.factory('PostResource', ['$resource', function($resource) {
return $resource('http://jsonplaceholder.typicode.com/posts/:id', {id:"@id"},
    {
        update: { method:'PUT' }
    });
}])

// .factory("idioma",function() {
//   return "es-es";
// })
// .factory("matematicas_simples",function() {
//   return {
//     sumar:function(a,b) {
//       return a+b;
//     },
//     restar:function(a,b) {
//       return a-b;
//     }
//   }
// })
// .factory("radio",function() {
//   return 10;
// })
// factory("area",function() {
//   return function(radio) {
//     return 3.1416*radio*radio;
//   }
// });

// app.controller("PruebaController",["$scope","idioma","matematicas_simples","radio","area",function($scope,idioma,matematicas_simples,radio,area) {
//   $scope.idioma=idioma;
//   $scope.suma=matematicas_simples.sumar(3,6);
//   $scope.area=area(radio);
// }]);
