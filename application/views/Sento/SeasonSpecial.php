<div ng-controller="SSpecialController">
  <section id="SeasonSpecial">
    <div class="container">
      <div class="row">
        <div class="col-md-12 d-flex seasonspecial-container">
          <div class="col-md-6 seasonspecial-image">
            <img class="season-img" ng-src="{{url}}assets/Images/temporal/coconut.jpg">
          </div>
          <div class="col-md-6 seasonspecial-information">
            <div class="col-md-12 p-0 seasonspecial-information-container">
              <h1 class="s-title">COCONUT EXPERIENECE</h1>
              <p class="s-text">Duis condimentum convallis libero vitae henderit.
              aliquam erat volutpat. vivamus purus magna.</p>
              <div class="col-md-12 p-0 seasonspecial-slider">
                <div class="col-md-12 p-0 seasonspecial-information-btns">
                  <div class="">
                    <button type="button" class="sento-form-btns">HER</button>
                    <button type="button" class="sento-form-btns">HIM</button>
                  </div>
                  <div class="buttons-slider-res">
                    <i class="icon ion-android-arrow-dropleft slide-prev"></i>
                    <span class="pagingInfo"></span>
                    <i class="icon ion-android-arrow-dropright slide-next"></i>
                  </div>
                </div>
                <!-- SLICK SLIDER -->
                <div class="slider">
                  <!-- slider-container -->
                  <div class="col-md-12 p-0 slider-container">
                    <div class="slider-header">
                      <h3>BEAUTY NAILS</h3><h3>US$65</h3>
                    </div>
                    <div class="slider-items">
                      <p class="s-text">Cuccio UV Gel o Set de uñas acrilicas</p>
                      <p class="s-text">Lavado Re-Structure</p>
                      <p class="s-text">Moldeado</p>
                      <p class="s-text">Manicure o pedicure Collagen Treatment</p>
                    </div>
                    <div class="slider-footer">
                      <button type="button" class="btn sento-btns">{{addBagButton}}</button>
                      <p class="msgBook">
                        this item has been succesfully added to your cart! Click <b>HERE</b> to view your cart.
                      </p>
                    </div>
                  </div>
                  <!-- slider-container -->
                  <!-- slider-container -->
                  <div class="col-md-12 p-0 slider-container">
                    <div class="slider-header">
                      <h3>COCONUT FACIAL</h3><h3>US$45</h3>
                    </div>
                    <div class="slider-items">
                      <p class="s-text">Cuccio UV Gel o Set de uñas acrilicas</p>
                      <p class="s-text">Lavado Re-Structure</p>
                      <p class="s-text">Moldeado</p>
                      <p class="s-text">Manicure o pedicure Collagen Treatment</p>
                    </div>
                    <div class="slider-footer">
                      <button type="button" class="btn sento-btns">{{addBagButton}}</button>
                      <p class="msgBook">
                        this item has been succesfully added to your cart! Click <b>HERE</b> to view your cart.
                      </p>
                    </div>
                  </div>
                  <!-- slider-container -->
                </div>
                <!-- SLICK SLIDER -->
                <!-- SLICK SLIDER BUTTONS-->
                <div class="buttons-slider">
                  <i class="icon ion-android-arrow-dropleft slide-prev"></i>
                  <!-- <button class="slide-prev" type="button" name="button">PREV</button> -->
                  <span class="pagingInfo"></span>
                  <i class="icon ion-android-arrow-dropright slide-next"></i>
                  <!-- <button class="slide-next" type="button" name="button">NEXT</button> -->
                </div>
                <!-- SLICK SLIDER BUTTONS-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- <script type="text/javascript">
$(document).ready(function(){
var $status = $('.pagingInfo');
var $slickElement = $('.slider');

$slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
    //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
    var i = (currentSlide ? currentSlide : 0) + 1;
    $status.text(i + '/' + slick.slideCount);
});

$(".slider").slick({
dots: false,
slidesToShow: 1,
autoplay: false,
autoplaySpeed: 3000,
centerMode: true,
centerPadding: '0px',
prevArrow: $('.slide-prev'),
nextArrow: $('.slide-next'),
customPaging : function(slider, i) {
var thumb = $(slider.$slides[i]).data();
return '<a>1</a>';
        }
});
});
</script> -->
