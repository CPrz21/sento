<div ng-controller="SGiftsController">
  <div class="sg-nav">
    <div class="col-md-6 sg-nav-container">
      <a href="#">Gift Card</a>
      <a href="#">Gift Certificate</a>
      <a href="#">Member Card</a>
    </div>
  </div>
  <section id="gift_card">
    <div class="container">
      <div class="row">
        <div class="col-md-12 sg-container">
          <div class="offset-md-1 col-md-5 sg-right">
            <div class="col-md-12 sg-text">
              <h1>GIFT CARD</h1>
              <p>
                Duis condimentum convallis libero vitae henderit.
                aliquam erat volutpat. vivamus purus magna.
              </p>
              <img ng-src="{{url}}assets/Images/temporal/GiftcardBIG.png">
            </div>
          </div>
          <div class="col-md-6 sg-left">
            <div class="sg-form">
              <h5 class="sg-form-title">GIFT CARD DETAILS</h5>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>AMOUNT</p>
                </div>
                <div class="col-md-10 d-flex p-0">
                  <button type="button" class="sento-form-btns">$25</button>
                  <button type="button" class="sento-form-btns">$50</button>
                  <button type="button" class="sento-form-btns">$75</button>
                  <button type="button" class="sento-form-btns">$150</button>
                  <button type="button" class="sento-form-btns">ENTER AMOUNT</button>
                </div>
              </div>
              <div class="offset-md-2 col-md-10 p-0">
                <p class="sg-row-warning">The minimum amount is $15</p>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0 sg-form-delivery-title">
                  <p>DELIVERY</p>
                </div>
                <div class="col-md-10 d-flex p-0 sg-form-delivery-btns">
                  <p>EMAIL</p>
                  <p>TEXT MESSAGE</p>
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>TO</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <input type="text" class="form-control sg-form-input" placeholder="enter an email for each recipient">
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>FROM</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <input type="text" class="form-control sg-form-input" placeholder="your name">
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>MESSAGE</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <textarea class="form-control sg-form-input" rows="2" placeholder="Hope you enjoy this sento gift card!"></textarea>
                </div>
              </div>
              <div class="col-md-10 d-flex flex-wrap pl-0 sg-form-footer">
                  <div class="col-md-12 d-flex justify-content-between pl-0 align-items-center">
                    <!-- <h6>ADD TO SHOPPING BAG</h6> -->
                    <button type="button" class="btn sento-btns">ADD TO SHOPPING BAG</button>
                    <p>1 Gift Card: $25</p>
                  </div>
                  <div class="col-md-12 pl-0 mt-3">
                    <p class="sg-form-terms">
                      Gift Cards are subject to <a href="#">Terms and Conditions.</a> Gift Cards area
                      not returnable after purchase (except as required by law).
                      Haver an Sento Gift Card? <a href="#">Redeem</a> your gift card.
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="gift-certificates">
    <div class="container">
      <div class="row">
        <div class="col-md-12 sg-container">
          <div class="offset-md-1 col-md-5 sg-right">
            <div class="col-md-12 sg-text">
              <h1>GIFT CERTIFICATES</h1>
              <p>
                Duis condimentum convallis libero vitae henderit.
                aliquam erat volutpat. vivamus purus magna.
              </p>
              <img ng-src="{{url}}assets/Images/temporal/certificate_BIG.png">
            </div>
          </div>
          <div class="col-md-6 sg-left">
            <div class="sg-form">
              <h5 class="sg-form-title">CERTIFICATES DETAILS</h5>
              <div class="col-md-12 d-flex p-0 mb-1 sg-form-row">
                <h4 class="sg-list-steps"><span>1.</span> Choose a service for your gift certificate</h4>
              </div>
              <div class="col-md-12 d-flex p-0 mb-4 sg-form-row align-items-center">
                <i class="icon ion-plus-round"></i><h4 class="sg-add-service">ADD ANOTHER SERVICE</h4>
              </div>
              <div class="col-md-12 d-flex p-0 mb-1 sg-form-row">
                <h4 class="sg-list-steps"><span>2.</span> How do you want to send it</h4>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0 sg-form-delivery-title">
                  <p>DELIVERY</p>
                </div>
                <div class="col-md-10 d-flex p-0 sg-form-delivery-btns">
                  <button type="button" class="sento-form-btns">EMAIL</button>
                  <button type="button" class="sento-form-btns">TEXT MESSAGE</button>
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 mb-1 sg-form-row">
                <h4 class="sg-list-steps"><span>3.</span> Who is it for?</h4>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>TO</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <input type="text" class="form-control sg-form-input" placeholder="enter an email for each recipient">
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>FROM</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <input type="text" class="form-control sg-form-input" placeholder="your name">
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>MESSAGE</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <textarea class="form-control sg-form-input" rows="2" placeholder="Hope you enjoy this sento experience!"></textarea>
                </div>
              </div>
              <div class="col-md-10 d-flex flex-wrap pl-0 sg-form-footer">
                  <div class="col-md-12 d-flex justify-content-between pl-0 align-items-center">
                    <button type="button" class="btn sento-btns">ADD TO SHOPPING BAG</button>
                    <p>1 Gift Certificate: $25</p>
                  </div>
                  <div class="col-md-12 pl-0 mt-3">
                    <p class="sg-form-terms">
                      Gift Cards are subject to <a href="#">Terms and Conditions.</a> Gift Cards area
                      not returnable after purchase (except as required by law).
                      Haver an Sento Gift Card? <a href="#">Redeem</a> your gift card.
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="member-card">
    <div class="container">
      <div class="row">
        <div class="col-md-12 sg-container">
          <div class="offset-md-1 col-md-5 sg-right">
            <div class="col-md-12 sg-text">
              <h1>SAPPHIRE & BLACK PASS</h1>
              <p>
                Duis condimentum convallis libero vitae henderit.
                aliquam erat volutpat. vivamus purus magna.
              </p>
              <img ng-src="{{url}}assets/Images/temporal/sppr_blck_BIG.png">
            </div>
          </div>
          <div class="col-md-6 sg-left">
            <div class="sg-form">
              <h5 class="sg-form-title">MEMBER CARD DETAILS</h5>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>TYPE</p>
                </div>
                <div class="col-md-10 d-flex p-0">
                  <button type="button" class="sento-form-btns">BLACK PASS / <span>US$500</span></button>
                  <button type="button" class="sento-form-btns">SAPPHIRE / <span>US$1000</span></button>
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0 sg-form-delivery-title">
                  <p>DELIVERY</p>
                </div>
                <div class="col-md-10 d-flex p-0 sg-form-delivery-btns">
                  <button type="button" class="sento-form-btns">EMAIL</button>
                  <button type="button" class="sento-form-btns">TEXT MESSAGE</button>
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>TO</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <input type="text" class="form-control sg-form-input" placeholder="enter an email">
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>FROM</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <input type="text" class="form-control sg-form-input" placeholder="your name">
                </div>
              </div>
              <div class="col-md-12 d-flex p-0 sg-form-row">
                <div class="col-md-2 d-flex p-0">
                  <p>MESSAGE</p>
                </div>
                <div class="col-md-7 d-flex p-0">
                  <textarea class="form-control sg-form-input" rows="2" placeholder="Hope you enjoy this sento member card!"></textarea>
                </div>
              </div>
              <div class="col-md-10 d-flex flex-wrap pl-0 sg-form-footer">
                  <div class="col-md-12 d-flex justify-content-between pl-0 align-items-center">
                    <!-- <h6>ADD TO SHOPPING BAG</h6> -->
                    <button type="button" class="btn sento-btns">ADD TO SHOPPING BAG</button>
                    <p>1 Black Pass: $500</p>
                  </div>
                  <div class="col-md-12 pl-0 mt-3">
                    <p class="sg-form-terms">
                      Gift Cards are subject to <a href="#">Terms and Conditions.</a> Gift Cards area
                      not returnable after purchase (except as required by law).
                      Haver an Sento Gift Card? <a href="#">Redeem</a> your gift card.
                    </p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
