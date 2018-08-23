<div ng-controller="ContactUsController">
  <section id="contactus">
    <div class="container">
      <div class="row d-flex align-items-top">
        <div id="map" class="col-md-12">

        </div>
        <div class="col-md-12 d-flex contact-container">
          <div class="c-address">
            <p>{{(selectedlanguage == 'en') ? wordsData[0].title_En : wordsData[0].title_Es;}}</p>
            <p class="c-sub">{{ContactText[0].texto}}</p>
          </div>
          <div class="c-reserva">
            <p class="c-title">{{(selectedlanguage == 'en') ? wordsData[1].title_En : wordsData[1].title_Es;}}</p>
            <p class="c-sub">T. <b>{{ContactText[1].texto}}</b>
            <br>W. <b>{{ContactText[2].texto}}</b></p>
            <p>{{(selectedlanguage == 'en') ? wordsData[2].title_En : wordsData[2].title_Es;}}</p>
            <button type="button" ng-click="quetionsModal()">{{(selectedlanguage == 'en') ? wordsData[3].title_En : wordsData[3].title_Es;}}</button>
          </div>
          <div class="c-news">
            <p class="c-title">{{(selectedlanguage == 'en') ? wordsData[4].title_En : wordsData[4].title_Es;}}</p>
            <p class="c-sub">{{(selectedlanguage == 'en') ? wordsData[5].title_En : wordsData[5].title_Es;}}</p>

            <div class="input-group">
              <input type="text" class="form-control" placeholder="{{(selectedlanguage == 'en') ? wordsData[6].title_En : wordsData[6].title_Es;}}">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button"><i class="icon ion-ios-arrow-thin-right"></i></button>
              </span>
            </div>

          </div>
          <div class="c-connect">
            <p>{{(selectedlanguage == 'en') ? wordsData[7].title_En : wordsData[7].title_Es;}}</p>
            <a class="icon ion-social-facebook" href="#"></a>
            <a class="icon ion-social-instagram-outline" href="#"></a>
            <a class="icon ion-social-twitter" href="#"></a>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>
