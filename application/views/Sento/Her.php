<div ng-controller="HerController">
<section menuscroll id="{{herSection.sectionName}}">
  <div class="s-down bounce">
    <img ng-src="{{url}}assets/Images/scrolldown_arrow_preview.png">
    <p>scroll down</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <h1>{{herSection.texto_1}}</h1>
        <p>{{herSection.texto_2}}</p>
      </div>
    </div>
  </div>
</section>
<section id="{{herSection.sectionName}}_optns">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-2">
        <div class="getFixed">
          <p ng-repeat="optn in optnsSection">{{optn.nombre}}</p>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row pb-5" ng-repeat="n in [] | range:5">
          <div class="col-md-12 d-flex align-items-center head-item">
            <h3 class="pr-5">Bridal Make Up</h3>
            <h3 class="pl-5">US$20</h3>
            <div class="price-offer">
              <div>
              <p>10%OFF</p>
              <p>US$18</p>
              </div>
            </div>
            <!-- <h3 class="pr-5">Bridal Make Up</h3>
            <h3 class="pl-5">US$20</h3>
            <div style="display: flex;margin: 0 0 0 8%;border: 1px solid;">
              <p style="margin: 0;border-right: 1px solid;padding: 0 10%;">10%OFF</p>
              <p style="/*! margin: 0; *//*! padding: 0 10%; */">US$18</p>
            </div> -->
          </div>
          <div class="col-md-12 info-item">
            <p>This is a face & Body package. Efoliation and modeling techniques are performed with tehe use of
            volcanic and sea stones in a complete treatment for purificaition, remineralist an relaxations.</p>
          </div>
          <div class="col-md-12 d-flex align-items-center btns-item">
            <p class="btnBook">BOOK THIS EXPERIENCE</p>
            <p class="msgBook">
              this item has been succesfully added to your cart!
              <br>Click <b>HERE</b> to view your cart.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
