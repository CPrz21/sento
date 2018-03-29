angular.module("FinalApp")
// .factory("PostResource" function($resource){
//   return $resource(base_url + "AjaxPost/get_data_C/", {null});
// })




.factory('PostResource', ['$resource', function($resource) {
return $resource('http://jsonplaceholder.typicode.com/posts/:id', {id:"@id"},
    {
        update: { method:'PUT' }
    });
}]);
