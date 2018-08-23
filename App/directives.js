var test=[];
var testids=[];
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
.directive("menuscroll", function ($window) {
    return function(scope, element, attrs) {
      var $divFixed = $('.getFixed');
      var $win = $(window);
      var winH = $win.height();
      var winW = $win.width();

      if (winW > 767) {
        angular.element($window).bind("scroll", function() {
            if (this.pageYOffset > winH) {
              $divFixed.css({
                'position': 'fixed',
                'top': '40px'
              });
             } else {
               $divFixed.css({
                  'position': 'relative',
                  'top': 'auto'
                });
             }
            scope.$apply();
        });
      }
    };
})
.directive("scroll", function ($window) {
    return function(scope, element, attrs) {

        angular.element($window).bind("scroll", function() {
            if (this.pageYOffset >= 100) {
                 scope.navOnBottom=true;
             } else {
                 scope.navOnBottom=false;
             }
            scope.$apply();
        });
    };
})
.directive('slideToggle', function() {
  return {
    restrict: 'A',
    scope:{
      isOpen: "=slideToggle" // 'data-slide-toggle' in our html
    },
    link: function(scope, element, attr) {
      var slideDuration = parseInt(attr.slideToggleDuration, 10) || 200;

      var ide=attr.slideToggle;
      test.push(attr.slideToggle);
      //console.log(ide);

      //$(".hidden-items").css("display", "none");

      // Watch for when the value bound to isOpen changes
      // When it changes trigger a slideToggle
      scope.$watch('isOpen', function(newIsOpenVal, oldIsOpenVal){

        for (let value of test) {
          if(value!=ide){
            $("."+value).css("display", "none");
          }

        }
        if(newIsOpenVal !== oldIsOpenVal){
          element.stop().slideToggle(slideDuration);
        
        }
      });

    }
  };
});
