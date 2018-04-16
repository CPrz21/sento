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
