//angular.module("SentoApp")
// .factory("PostResource" function($resource){
//   return $resource(base_url + "AjaxPost/get_data_C/", {null});
// })




app.factory('getSecciones', ['$resource', function($resource) {
return $resource(base_url+'SentoData/getSecciones',null,
    {
      'post': {
             method: "POST",
             isArray:true,
             headers: {
                       'Content-Type': 'application/x-www-form-urlencoded'
                     }
         }
    });
}])
.factory('getIdioma', ['$resource', function($resource) {
return $resource(base_url+'SentoData/getIdioma',null,
    {
      'post': {
             method: "POST"
         }
    });
}])
.factory('ContactusWords', ['$resource', function($resource) {
return $resource('app/words/ContactUs.json',null,
    {
      'get': {
             isArray:true,
         }
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
