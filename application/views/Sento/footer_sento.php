
<!-- GOOGLE MAPS API-->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn2suJBTqWGl-K-S_8ujOix9HZwW8kIT4"></script> -->

<script type="text/javascript">
$(document).ready(function(){
  // var myLatLng = {lat: 13.704951, lng: -89.244222};
  //
  //       var map = new google.maps.Map(document.getElementById('map'), {
  //         zoom: 16,
  //         center: myLatLng
  //       });
  //
  //
  //       var marker = new google.maps.Marker({
  //                 position: myLatLng,
  //                 map: map,
  //                 title: 'Hello World!'
  //       });
});
</script>


<script type="text/javascript">
$(document).ready(function(){
var $status = $('.pagingInfo');
var $slickElement = $('.slider');

$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text('SPECIAL HER '+i + '/' + slick.slideCount);
});

$(".slider").slick({
dots: false,
slidesToShow: 1,
autoplay: false,
autoplaySpeed: 3000,
// centerMode: true,
// centerPadding: '0px',
prevArrow: $('.slide-prev'),
nextArrow: $('.slide-next'),
customPaging : function(slider, i) {
var thumb = $(slider.$slides[i]).data();
return '<a>1</a>';
        }
});
});
</script>

</body>
</html>
