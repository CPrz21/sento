function gallerySento(bricks){
  bricks.splice(0, 0, {});
  var bricksColumns={};
  // var brick = bricks.slice(8,15);
  var total = Math.ceil(bricks.length/3);
  var brickId=1,
      numInicio=1,
      numFin=4;
  var brickRows={};
  var columnSide="";
  var columnDiv;
  var galleryViewer="";
  var currentNum=0;

  for (var i=0; i < total; i++)
  {
    bricksColumns['brick'+brickId]=bricks.slice(numInicio,numFin);
    brickId=brickId+1;
    numInicio=numInicio+3;
    numFin=numFin+3;
  }

  //console.log(bricksColumns['brick1']);
  for (var ii=1; ii < total+1; ii++)
  {
      if (columnSide=="" || columnSide=="R"){
        columnSide="L"
        columnDiv="column-l"
      }else if (columnSide=="L"){
        columnSide="M"
        columnDiv="column-m"
      }else if (columnSide=="M"){
        columnSide="R"
        columnDiv="column-r"
      }
      if (ii!=0){
        //console.log(bricksColumns['brick'+ii]);
        galleryViewer+='<div class='+columnDiv+'>\n';
        for (var value of bricksColumns['brick'+ii]) {
          //console.log(value.src);
          currentNum++;
          galleryViewer+='<div class="gallery-items">\n'+
            '<div class="service-gallery" onclick="openModal();currentSlide('+currentNum+')">\n'+
              '<p class="m-0 text-center">'+value.descripcion+'</p>'+
            '</div>\n'+
            '<img class="gallery-img" src="'+base_url+''+value.url+'" style="width:100%">\n'+
          '</div>\n';
        }

         galleryViewer+='</div>\n';

      }

    }

    //console.log(galleryViewer);
    return galleryViewer;
}

function galleryViewer(images){
  var modalViewer="";
  //imagesCount=(images.length)+1;
  for (var i=1; i < images.length; i++)
  {
    modalViewer+='<div class="mySlides">'+
      '<h3>'+images[i].descripcion.toUpperCase()+' | <b>'+images[i].lugar.toUpperCase()+'</b></h3>'+
      '<div class="numbertext"></div>'+
      '<img class="img-fluid h-100" src="'+base_url+''+images[i].url+'"  style="width:100%">'+
    '</div>'
  }

  modalViewer+='<a class="prev icon ion-ios-arrow-thin-left" onclick="plusSlides(-1)">'+
                  '<div class="text-arrow-container">'+
                    '<p>PREVIOUS PHOTO</p>'+
                  '</div>'+
                '</a>'+
                '<a class="next icon ion-ios-arrow-thin-right" onclick="plusSlides(1)">'+
                  '<div class="text-arrow-container">'+
                    '<p>NEXT PHOTO</p>'+
                  '</div>'+
                '</a>'
  //console.log(modalViewer);
  return modalViewer;
}
