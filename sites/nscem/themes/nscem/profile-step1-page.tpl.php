    <main id="profile-page" class="profile-page step1">
      <div class="welcome-note">Hi Amanda, tell us about yourself and we'll personalise the website  for you. </div>
      <div class="step-tracker">
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-sm-push-4">
              <ul class="track-wrapper">
                <li class="active"><a href="javascript:void(0);">1</a></li>
                <li><a href="javascript:void(0);">2</a></li>
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
            <div class="promote-msg">
              <div class="point">
                <p>+400</p>
              </div>
              <span>Complete your profile info to earn <strong>400 points!</strong></span>
            </div>

            <div class="form-wrapper row">
              <div class="form-group">
                <div class="form-row col-sm-4">
                  <label>Title(Optional)</label>
                  <div class="select-wrapper title-select">
                    <select>
                      <option>Please select</option>
                    </select>
                  </div>
                </div>
                <div class="first-name form-row col-sm-4 col-xs-6">
                  <label>First Name</label>
                  <input class="big" type="text"/>
                </div>
                <div class="surname form-row col-sm-4 col-xs-6">
                  <label>Surname</label>
                  <input class="big" type="text"/>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row col-sm-4">
                  <label>Nickname (Optional)</label>
                  <input class="big" type="text"/>
                </div>
                <div class="form-row col-sm-8">
                  <label>Email</label>
                  <input class="big" type="text"/>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row col-sm-6">
                  <label>Password</label>
                  <input class="big" type="password"/>
                  <a class="change-password" href="javascript:void(0);">Change Password</a>
                </div>
                <div class="form-row col-sm-6">
                  <label>Gender</label>
                  <div class="select-wrapper gender-select">
                    <select>
                      <option>Please select</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group special">
                <div class="month form-row col-sm-4 col-xs-4">
                  <label>Date of Birth</label>
                  <div class="select-wrapper month-select">
                    <select>
                      <option>Month</option>
                    </select>
                  </div>
                </div>
                <div class="day form-row col-sm-4 col-xs-4">
                  <label>&nbsp;</label>
                  <div class="select-wrapper day-select">
                    <select>
                      <option>Date</option>
                    </select>
                  </div>
                </div>
                <div class="year form-row col-sm-4 col-xs-4">
                  <label>&nbsp;</label>
                  <div class="select-wrapper year-select">
                    <select>
                      <option>Year</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row col-sm-12">
                  <label>Full Address</label>
                  <input class="big" type="text"/>
                  <input class="big" type="text"/>
                  <input class="big" type="text"/>
                </div>
              </div>

              <div class="form-group">
                <div class="form-row col-sm-4">
                  <label>Town/City</label>
                  <input class="big" type="text"/>
                </div>
                <div class="postcode form-row col-sm-4 col-xs-6">
                  <label>Postcode</label>
                  <input class="big" type="text"/>
                </div>
                <div class="state form-row col-sm-4 col-xs-6">
                  <label>State</label>
                  <input class="big" type="text"/>
                </div>
              </div>

              <div class="form-group special">
                <div class="form-row col-sm-4 col-xs-4 no-padding-right">
                  <label>Mobile</label>
                  <input class="big" type="text" placeholder="Area Code"/>
                </div>
                <div class="form-row col-sm-8 col-xs-8 no-padding-left">
                  <label>&nbsp;</label>
                  <input class="big" type="text" placeholder="Number"/>
                </div>
              </div>

              <div class="agreement col-sm-12">
                <p class="checkbox style-1">
                  <label for="agree-check">
                  <input class="big" type="checkbox"><span class="icon" id="agree-check"></span>I want to receive news & offers form Nestlé</label>
                </p>
                <div class="btn-action">
                  <a class="btn btn-green next-btn" href="<?php print url('profile/1/step2');?>">Next</a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
    </main>
