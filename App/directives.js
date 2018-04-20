app.directive('selectDropDown',function($document){
  return{
    scope:{
      selectOptions:'=',
      selectedName: '='
    },
    restrict:'E',
    templateUrl:urlTemplates+'directives-tpl/select.html',
    link: function(scope, element, attr){
      scope.showOptions = false;
      scope.toggleOptions = function(){
        scope.showOptions = !scope.showOptions;
      }
      scope.selectOption = function(option){
        scope.selectedName = option;
      }
    }
  }
})
.directive("scroll", function ($window) {
    return function(scope, element, attrs) {

        angular.element($window).bind("scroll", function() {
            if (this.pageYOffset >= 100) {
                 scope.navOnBottom=true;
                 console.log('Scrolled below header.');
             } else {
                 scope.navOnBottom=false;
                 console.log('Header is in view.');
             }
            scope.$apply();
        });
    };
});
