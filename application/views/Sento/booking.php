<div ng-controller="BookingController">
  <section id="Booking" class="height-100">
    <div class="container-fluid main-booking d-flex align-items-center justify-content-center">
      <h1 class="section-title">BOOK YOUR EXPERIENCE</h1>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 p-0">
          <div id="book-steps">
              <h3>Shopping Bag</h3>
              <section>
                  <div class="container">
                    <div class="row">
                      <div class="col-10 mx-auto height-100">
                        <div class="col-6">
                          <div class="col-12">
                            <div class="col-12 d-flex shop-item">
                              <i class="icon ion-ios-close-empty"></i>
                              <h5>Gift Card&nbsp;&nbsp;&nbsp;&nbsp;x&nbsp;&nbsp;&nbsp;&nbsp;1</h5>
                              <p class="m-0"><b>Price:</b> US $25</p>
                            </div>
                            <div class="gift-check ml-4">
                              <label class="container">
                                <p>This is a gift</p>
                                <input type="checkbox" ng-model="checked">
                                <span class="checkmark"></span>
                              </label>
                            </div>
                            <div class="col-12" ng-show="checked">
                              <h1>prueba</h1>
                            </div>
                          </div>
                        </div>
                        <div class="col-6">

                        </div>
                      </div>
                    </div>
                  </div>
              </section>
              <h3>Login</h3>
              <section>
                  <p>Wonderful transition effects.</p>
              </section>
              <h3>Booking</h3>
              <section>
                  <p>The next and previous buttons help you to navigate through your content.</p>
              </section>
              <h3>Pay</h3>
              <section>
                  <p>The next and previous buttons help you to navigate through your content.</p>
              </section>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
  $("#book-steps").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true,
    titleTemplate: '<span class="number px-2 mr-3">#index#</span> <p class="m-0 tab-title">#title#</p>',
    labels: {
        next: "Siguiente",
        previous: "Anterior",
    }
  });
</script>
