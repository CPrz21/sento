app.run(function($rootScope) {
    $rootScope.viewer = false;
    $rootScope.url = base_url;
    $rootScope.assetsUrl = base_url+'assets/';
    $rootScope.libsUrl = base_url+'App/libs/';
    $rootScope.appUrl = base_url+'App/';
    $rootScope.navBar = {};
    $rootScope.selectedlanguage="EN";
    $rootScope.addBagButton=($rootScope.selectedlanguage == 'EN') ? 'ADD TO SHOPPING BAG' : 'AGREGAR AL CARRITO';
})
.controller('NavBarController',function($scope,$q,getSecciones,$window,$httpParamSerializerJQLike,$rootScope,getIdioma,Popeye,SidebarJS){
  var urlSeccion=window.location.href ;
  var lastslashindex = urlSeccion.lastIndexOf('/');
  var seccionUrl=urlSeccion.substring(lastslashindex  + 1);

  $scope.himM = false;
  $scope.herM = false;
  $scope.box1 = $scope.box2 = $scope.box3 = true;

  // $scope.idiomas = [ {name: 'EN'}, {name: 'ES'}];//idiomas para select responsives
  // $scope.selectedopt = $scope.idiomas[0];
  $scope.viewSlide=function(sidebarName){
    SidebarJS.toggle(sidebarName);
  }
  $scope.forgotVal=true;
  $scope.createVal=true;
  $scope.loginModal = ()=> {//PARA MODAL DE DETALLE VALE
      var modal = Popeye.openModal({
        templateUrl: "App/templates/loginModal.html",
        // controller: "modalController as ctrl",
        modalClass:"popeye-md-modal rounded-0",
        // resolve: {
        //   valeHead:()=>{
        //     return valeC;
        //   },
        //   detallesVale:($http,$httpParamSerializerJQLike)=>{
        //     var tipo=2,
        //         cliente_POS=$rootScope.infoCliente.cliente.cliente_POS,
        //         token=$rootScope.infoCliente.cliente.token,
        //         vale=valeC.vale;
        //
        //
        //     var data = apiData(tipo,cliente_POS,0,token,0,0,vale);
        //     return getValesDetalle.post($httpParamSerializerJQLike(data));
        //   }
        // }
      });
    };

  $scope.closeModal= function(){

    Popeye.closeCurrentModal();
  }
  $scope.update = function() {
    var urlRedirect= base_url+$scope.selectedopt.name+"/"+seccionUrl
    //console.log(urlRedirect);
    $window.location.href = urlRedirect;
  }

  $scope.redirect=(url)=>{
    $window.location.href=base_url+url;
  }

  $scope.navSlide = function(){
    console.log('entro');
    $('#slide').animate({width:'toggle'},350);
  }

  function DropdownController() {
    var vm = this;

    vm.isCollapsed = true;
    vm.status = {
      isopen: false
    }
  }

    getSecciones.post($httpParamSerializerJQLike({tipo:1,id:2})).$promise.then(function(result) {

    $rootScope.navBar=result;
    console.log($rootScope.navBar);
    }, function(error) {
      console.error('Error in data loading');
    });

    angular.element(document).ready(function () {
      if ($(window).height() < 767) {
        $('#slide').css('display','none');
      }
    });


    $q.all([
       getIdioma.post().$promise,//IDIOMA
       getSecciones.post($httpParamSerializerJQLike({tipo:3,id:2})).$promise,
       getSecciones.post($httpParamSerializerJQLike({tipo:3,id:4})).$promise,
       getSecciones.post($httpParamSerializerJQLike({tipo:3,id:6})).$promise
     ]).then((data)=>{
        $scope.idioma=data[0];
        $scope.herOptions=data[1];
        $scope.himOptions=data[2];
        $scope.spaOptions=data[3];

        $rootScope.selectedlanguage=$scope.idioma.idioma;



        var langddSelect =$scope.idioma.idioma == "EN" ? "ES" : "EN";
        // var langHref= (langddSelect == "EN" ? $rootScope.url : $rootScope.url+"Es/home");
        var langHref= base_url+langddSelect+"/"+seccionUrl;
        $scope.ddSelectOptions = [{text:langddSelect,value:langddSelect,href: langHref}];
        $scope.ddSelectSelected = {text: $scope.idioma.idioma,value: $scope.idioma.idioma};

        $scope.idiomas = [ {name: (langddSelect == "EN" ? "ES" : "EN")}, {name: (langddSelect == "EN" ? "EN" : "ES")}];//idiomas para select responsives
        $scope.selectedopt = $scope.idiomas[0];


      }).catch((data)=> {

      }).finally(()=> {

      });

})
.controller('HomeController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones,getIdioma){
  if (winW > resWidth) {
    var myNav = angular.element( document.querySelector( '#sento-nav' ) );
    myNav.removeClass('fixed-top');
    myNav.addClass('fixed-bottom');
    $(".box-optns").css({"top": "unset","bottom": "70px"});
  }

  $q.all([
     getIdioma.post().$promise,//IDIOMA
     getSecciones.post($httpParamSerializerJQLike({tipo:2,id:1})).$promise//Home
   ]).then((data)=>{
      $scope.idioma=data[0];
      $scope.mainSection=Secciones(data[1]);

      var langddSelect =$scope.idioma.idioma == "EN" ? "ES" : "EN";
      var langHref= (langddSelect == "EN" ? $rootScope.url : $rootScope.url+"Es/home");
      $scope.ddSelectOptions = [{text:langddSelect,value:langddSelect,href: langHref}];
      $scope.ddSelectSelected = {text: $scope.idioma.idioma,value: $scope.idioma.idioma};
      $rootScope.viewer = true;

    }).catch((data)=> {

    }).finally(()=> {

    });

})
.controller('HerController',function($scope,$rootScope,$q,$window,$httpParamSerializerJQLike,getSecciones){
  var urlSeccion=window.location.href;
  var lastslashindex = urlSeccion.lastIndexOf('/');
  var seccionUrl=urlSeccion.substring(lastslashindex  + 1);
  var lasthashindex=seccionUrl.lastIndexOf('?');
  var subcatUrl=seccionUrl.substring(lasthashindex  + 1);

  $q.all([
     getSecciones.post($httpParamSerializerJQLike({tipo:2,id:2})).$promise,
     getSecciones.post($httpParamSerializerJQLike({tipo:3,id:2})).$promise
   ]).then((data)=>{
      $scope.herSection=Secciones(data[0]);
      $scope.optnsSection=data[1];

      $rootScope.viewer = true;
      alert(subcatUrl);
    }).catch((data)=> {

    }).finally(()=> {

    });

})
.controller('HimController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones){
  $q.all([
     getSecciones.post($httpParamSerializerJQLike({tipo:2,id:4})).$promise,
     getSecciones.post($httpParamSerializerJQLike({tipo:3,id:4})).$promise
   ]).then((data)=>{
      $scope.himSection=Secciones(data[0]);
      $scope.optnsSection=data[1];


      $rootScope.viewer = true;

    }).catch((data)=> {

    }).finally(()=> {

    });

})
.controller('SpaController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones){
  $q.all([
     getSecciones.post($httpParamSerializerJQLike({tipo:2,id:6})).$promise,
     getSecciones.post($httpParamSerializerJQLike({tipo:3,id:6})).$promise
   ]).then((data)=>{
      $scope.spaSection=Secciones(data[0]);
      $scope.optnsSection=data[1];


      $rootScope.viewer = true;

    }).catch((data)=> {

    }).finally(()=> {

    });

})
.controller('SGiftsController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones){
  // $q.all([
  //    getSecciones.post($httpParamSerializerJQLike({tipo:2,id:6})).$promise,
  //    getSecciones.post($httpParamSerializerJQLike({tipo:3,id:6})).$promise
  //  ]).then((data)=>{
  //     $scope.spaSection=Secciones(data[0]);
  //     $scope.optnsSection=data[1];
  //
  //
  angular.element(document).ready(function () {
    $rootScope.viewer = true;
  });
  //
  //   }).catch((data)=> {
  //
  //   }).finally(()=> {
  //
  //   });

})
.controller('SSpecialController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones){
  // $q.all([
  //    getSecciones.post($httpParamSerializerJQLike({tipo:2,id:6})).$promise,
  //    getSecciones.post($httpParamSerializerJQLike({tipo:3,id:6})).$promise
  //  ]).then((data)=>{
  //     $scope.spaSection=Secciones(data[0]);
  //     $scope.optnsSection=data[1];
  //
  //
  angular.element(document).ready(function () {
    console.log($rootScope.addBagButton);
    $rootScope.viewer = true;
  });

  //
  //   }).catch((data)=> {
  //
  //   }).finally(()=> {
  //
  //   });

})
.controller('GalleryController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones){
  $q.all([
     getSecciones.post($httpParamSerializerJQLike({tipo:2,id:10})).$promise,
     getSecciones.post($httpParamSerializerJQLike({tipo:4,id:10})).$promise
   ]).then((data)=>{
      $scope.galleryText=data[0];
      $scope.galleryTextHead=$scope.galleryText[0].texto;
      $scope.gallerySections=data[1];
      //console.log($scope.gallerySections);
      $scope.gallerySection=gallerySento($scope.gallerySections);
      $scope.galleryViewer=galleryViewer($scope.gallerySections);
      $('#SentoGallery').html($scope.gallerySection);
      $('#modalViewer').html($scope.galleryViewer);

      $rootScope.viewer = true;
    }).catch((data)=> {

    }).finally(()=> {

    });

    // $scope.bricks = [
    //                   {null},
    //                   {src: 'spa9.jpg'},
    //                   {src: 'spa1.jpg'},
    //                   {src: 'spa2.jpg'},
    //                   {src: 'spa9.jpg'},
    //                   {src: 'spa1.jpg'},
    //                   {src: 'spa2.jpg'},
    //                   {src: 'spa9.jpg'}
    //                 ];
    // angular.element(document).ready(function () {
    //   $rootScope.viewer = true;
    // });


})
.controller('ContactUsController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones,ContactusWords,Popeye){
  var latMap="",
      longMap="";

    $scope.quetionsModal = ()=> {//PARA MODAL DE DETALLE VALE
        var modal = Popeye.openModal({
          templateUrl: "App/templates/questionsModal.html",
          // controller: "modalController as ctrl",
          modalClass:"popeye-md-modal rounded-0",
          // resolve: {
          //   valeHead:()=>{
          //     return valeC;
          //   },
          //   detallesVale:($http,$httpParamSerializerJQLike)=>{
          //     var tipo=2,
          //         cliente_POS=$rootScope.infoCliente.cliente.cliente_POS,
          //         token=$rootScope.infoCliente.cliente.token,
          //         vale=valeC.vale;
          //
          //
          //     var data = apiData(tipo,cliente_POS,0,token,0,0,vale);
          //     return getValesDetalle.post($httpParamSerializerJQLike(data));
          //   }
          // }
        });
      };
  $q.all([
     getSecciones.post($httpParamSerializerJQLike({tipo:2,id:11})).$promise
   ]).then((data)=>{
      $scope.ContactText=data[0];
      $scope.wordsData=ContactusWords.get();

      latMap=$scope.ContactText[3].texto;
      longMap=$scope.ContactText[4].texto;

      $rootScope.viewer = true;

      // Muestra google map
      angular.element(document).ready(function () {
        var myLatLng = {lat: parseFloat( latMap ), lng: parseFloat( longMap )};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: myLatLng
        });
        var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: 'Hello World!'
        });
      });

      $rootScope.viewer = true;

    }).catch((data)=> {

    }).finally(()=> {

    });

})
.controller('BookingController',function($scope,$rootScope,$q,$httpParamSerializerJQLike,getSecciones){

  angular.element(document).ready(function () {
    $rootScope.viewer = true;
  });

})

function Secciones(result){

  var obj={};

    for (i = 0; i < result.length; i++) {
      var num= i+1;
      if (Object.values(obj).indexOf(result[i].sectionName) == -1) {

         obj['sectionName']=result[i].sectionName;
      }
      if (Object.values(obj).indexOf(result[i].nombre) == -1) {

         obj['nombre_'+num]=result[i].nombre;
      }
      if (Object.values(obj).indexOf(result[i].texto) == -1) {
         obj['texto_'+num]=result[i].texto;
      }
      if (Object.values(obj).indexOf(result[i].url) == -1) {
         obj['url']=result[i].url;
      }

    }


  return obj;
}
