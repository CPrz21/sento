<div ng-controller="GalleryController">
  <section id="gallery">
    <div class="container h-100">
      <div class="row h-100">
        <div id="masonry" class="col-md-12">
          <h3>{{galleryTextHead}}</h3>
          <!-- MASONRY GALLERY -->
          <div class="row" id="SentoGallery">

            <!-- <div class="column-l">
              <div class="gallery-items">
                <div class="service-gallery" onclick="openModal();currentSlide(1)">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa9.jpg" style="width:100%">
              </div>
              <div class="gallery-items">
                <div class="service-gallery" onclick="openModal();currentSlide(2)">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa1.jpg" style="width:100%">
              </div>
              <div class="gallery-items">
                <div class="service-gallery">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa2.jpg" style="width:100%">
              </div>
            </div>
            <div class="column-m">
              <div class="gallery-items">
                <div class="service-gallery">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa9.jpg" style="width:100%">
              </div>
              <div class="gallery-items">
                <div class="service-gallery">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa1.jpg" style="width:100%">
              </div>
              <div class="gallery-items">
                <div class="service-gallery">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa2.jpg" style="width:100%">
              </div>
            </div>
            <div class="column-r">
              <div class="gallery-items">
                <div class="service-gallery">
                  <p>SERVICIO SENTO</p>
                </div>
                <img class="gallery-img" ng-src="{{url}}assets/Images/temporal/spa9.jpg" style="width:100%">
              </div>
            </div> -->
          </div>
          <!-- MASONRY GALLERY -->
        </div>
      </div>
    </div>
  </section>
  <!-- The Modal/Lightbox -->
<div id="myModal" class="mymodal">
  <!-- <div class="modal-head">
    <h3>SERVICIO SENTO</h3>
    <span class="close-m cursor" onclick="closeModal()">&times;</span>
  </div> -->
  <span class="close-m cursor" onclick="closeModal()">&times;</span>
  <div class="modal-container" id="modalViewer">

    <!-- <div class="mySlides">
      <div class="numbertext"></div>
      <img ng-src="{{url}}assets/Images/temporal/spa9.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext"></div>
      <img ng-src="{{url}}assets/Images/temporal/spa1.jpg" style="width:100%">
    </div> -->

    <!-- <div class="mySlides">
      <div class="numbertext">3 / 4</div>
      <img src="img3_wide.jpg" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
      <img src="img4_wide.jpg" style="width:100%">
    </div> -->

    <!-- Next/previous controls -->
    <!-- <a class="prev icon ion-ios-arrow-thin-left" onclick="plusSlides(-1)">
      <div class="text-arrow-container">
        <p>PREVIOUS PHOTO</p>
      </div>
    </a>
    <a class="next icon ion-ios-arrow-thin-right" onclick="plusSlides(1)">
      <div class="text-arrow-container">
        <p>NEXT PHOTO</p>
      </div>
    </a> -->

    <!-- Caption text -->
    <!-- <div class="caption-container">
      <p id="caption"></p>
    </div> -->

    <!-- Thumbnail image controls -->
    <!--<div class="column">
      <img class="demo" ng-src="{{url}}assets/Images/temporal/spa9.jpg" onclick="currentSlide(1)" alt="Nature">
    </div>

    <div class="column">
      <img class="demo" ng-src="{{url}}assets/Images/temporal/spa1.jpg" onclick="currentSlide(2)" alt="Snow">
    </div>

    <div class="column">
      <img class="demo" src="img3.jpg" onclick="currentSlide(3)" alt="Mountains">
    </div>

    <div class="column">
      <img class="demo" src="img4.jpg" onclick="currentSlide(4)" alt="Lights">
    </div> -->
  </div>
</div>
<!-- modal end -->
</div>
<script type="text/javascript">
// Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "flex";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
