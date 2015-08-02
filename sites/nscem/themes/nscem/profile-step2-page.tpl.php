    <main id="profile-page" class="profile-page step2">
      <div class="step-tracker">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-sm-push-4">
              <ul class="track-wrapper">
                <li><a href="javascript:void(0);">1</a></li>
                <li class="active"><a href="javascript:void(0);">2</a></li>
                <li><a href="javascript:void(0);">3</a></li>
                <li class="last"><a href="javascript:void(0);">4</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <section class="main container">
        <div class="row">
          <div class="col-sm-8 col-sm-push-2">
            <div class="title-wrapper">
              <h3>Allergies</h3>
              <p>Please add your allergies if you have any</p>
            </div>
            <div class="allergies-content">
              <p class="note">You have <span>3</span> allergies.</p>
              <ul class="added-list">
                <li>
                  Allergy 1 Lorem ipsum dolor sit amet
                  <span class="remove">x</span>
                </li>
                <li>
                  Allergy 2 Lorem ipsum dolor sit amet
                  <span class="remove">x</span>
                </li>
                <li>
                  Allergy 3 Lorem ipsum dolor sit amet Allergy 3 Lorem ipsum
                  dolor sit amet Allergy 3 Lorem ipsum dolor sit amet
                  <span class="remove">x</span>
                </li>
              </ul>
              <div class="tab-wrapper">
                <ul class="tab-nav">
                  <li class="active">
                    <a href="javascript:void(0);">Choose from list</a>
                  </li>
                  <li>
                    <a href="javascript:void(0);">Add your own</a>
                  </li>
                </ul>
                <div class="tab-content tab-1" style="display: none;">
                  <ul>
                    <li>Allergy 2 Lorem ipsum dolor sit</li>
                    <li>Allergy 2 Lorem ipsum dolor sit</li>
                    <li>Allergy 2 Lorem ipsum dolor sit</li>
                  </ul>
                </div>
                <div class="tab-content tab-2" style="display: block;">
                  <div class="custom-allergies">
                    <textarea class="text">
                    </textarea>
                    <span class="add-btn">+</span>
                  </div>
                </div>
              </div>

            </div>
            <div class="btn-action">
              <a class="btn btn-green-border" href="<?php print url('profile/1/step1');?>">Back</a>
              <a class="btn btn-green" href="<?php print url('profile/1/step3');?>">Next</a>
            </div>
          </div>
        </div>

      </section>
    </main>
