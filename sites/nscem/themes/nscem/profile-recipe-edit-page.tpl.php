<main class="recipe-page recipe-create">
      <div class="breadcrumb-container clearfix">
        <ol class="breadcrumb">
          <li><a href="#">Home</a></li>
          <li><a href="#">Cook</a></li>
          <li class="active">Dinner</li>
        </ol>
      </div>
      <section class="main container">
        <div class="row">
          <div class="col-sm-3 col-sm-push-9">
            <div class="aside recipe-submit">
              <h3 class="underline">Create Recipe</h3>
              <div class="info clearfix">
                <p>Your recipe will be private, only you can access and view it. If you want to publish it on the website, please use “Share with Nestle” feature. </p>
                <a class="btn btn-green hidden-xs" href="<?php print url('profile/1');?>">Submit</a>
                <p>By submitting, you accept the Terms &amp; Conditions</p>
              </div>
            </div>
          </div>
          <div class="col-sm-9 col-sm-pull-3">
            <div class="row">
              <div class="col-sm-5">
                <div class="recipe-photo">
                  <h3 class="no-underline">Recipe Photos <span class='icon-tip'></span></h3>
                  <div class="photo-wrapper">
                    <img src="<?php print base_path().path_to_theme();?>/images/dummy/recipe-create-upload.jpg"/>
                  </div>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="basic-info">
                  <h3>Basic Info</h3>
                  <div class="basic-form row">
                    <div class="form-row recipe-name col-sm-12">
                      <label>Recipe Name</label>
                      <input class="big" type="text"/>
                    </div>
                    <div class="form-row occasion col-sm-6">
                      <label>Occasion</label>
                      <div class="select-wrapper" id="occasion-dropdown">
                        <select>
                          <option>Please select</option>
                          <option>Value 1</option>
                          <option>Value 2</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row difficulty-level col-sm-6">
                      <label>Difficulty level</label>
                      <div class="difficulty-content">
                        <div class="stars">
                          <input type="radio" name="filter-diff" class="filter-diff-1" id="filter-diff-1" value="1">
                          <label class="filter-diff-1" for="filter-diff-1">1</label>

                          <input type="radio" name="filter-diff" class="filter-diff-2" id="filter-diff-2" value="2">
                          <label class="filter-diff-2" for="filter-diff-2">2</label>

                          <input type="radio" name="filter-diff" class="filter-diff-3" id="filter-diff-3" value="3">
                          <label class="filter-diff-3" for="filter-diff-3">3</label>

                          <input type="radio" name="filter-diff" class="filter-diff-4" id="filter-diff-4" value="4">
                          <label class="filter-diff-4" for="filter-diff-4">4</label>

                          <input type="radio" name="filter-diff" class="filter-diff-5" id="filter-diff-5" value="5">
                          <label class="filter-diff-5" for="filter-diff-5">5</label>
                          <span></span>
                        </div>
                      </div>
                    </div>
                    <div class="clearfix hidden-xs"></div>
                    <div class="form-row preparation-time col-sm-6 col-xs-6">
                      <label>Preparation Time</label>
                      <div class="input-wrapper">
                        <input class="big" type="text"/>
                        <span class="unit">min</span>
                      </div>
                    </div>

                    <div class="form-row serves col-sm-6 col-xs-6">
                      <label>Serves</label>
                      <div class="input-wrapper">
                        <input class="big" type="text"/>
                        <span class="unit">persons</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-5">
                <div class="ingredient">
                  <h3 class="underline">Ingredients <span class='icon-tip'></span></h3>
                  <div class="ingredient-wrapper">
                    <div class="ingredient-item">
                      <div class="ingredient-visual">
                        <p class="name">1 tablespoon Lemon Zest</p>
                        <span class="edit-icon"></span>
                      </div>
                      <div class="ingredient-edit">
                        <p class="title">Edit Ingredient</p>
                        <div class="edit-row">
                          <div class="qty">
                            <label>Quantity</label>
                            <input class="big" type="text"/>
                          </div>
                          <div class="fractions">
                            <label>Fractions</label>
                            <div class="select-wrapper fraction-select">
                              <select>
                                <option>Val 1</option>
                                <option>Val 2</option>
                              </select>
                            </div>
                          </div>
                          <div class="unit">
                            <label>Unit</label>
                            <div class="select-wrapper unit-select">
                              <select>
                                <option>tablesppoon</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="edit-row">
                          <label>Ingredient</label>
                          <input class="big" type="text"/>
                        </div>
                        <div class="edit-action">
                          <button class="cancel btn btn-green">Cancel</button>
                          <button class="save btn btn-green">Save</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="ingredient-add btn btn-green">Add new ingredient</button>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="directions">
                  <h3 class="underline">Directions <span class='icon-tip'></span></h3>
                  <div class="directions-wrapper">
                    <div class="step-item">
                      <div class="step-item-wrapper">
                        <div class="info">
                          <span class="counter">1</span>
                          <p>Marinate chicken drumettes with MAGGI Chicken Stock Cube, lemon zest, yogurt, garlic, mixed herbs, lemon juice, salt and 1 tablespoon of honey for 2 hours.</p>
                        </div>
                        <div class="step-action">
                          <a class="delete-btn" href="javascript:void(0);"></a>
                          <a class="move-btn" href="javascript:void(0);"></a>
                        </div>
                      </div>
                    </div>
                    <div class="step-item">
                      <div class="step-item-wrapper">
                        <div class="info">
                          <span class="counter">20</span>

                        </div>
                        <div class="step-action">
                          <a class="delete-btn" href="javascript:void(0);"></a>
                          <a class="move-btn" href="javascript:void(0);"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button class="step-add btn btn-green">Add new step</button>
                </div>
              </div>
            </div>
          </div>
          <div class="submit-bottom visible-xs-block">
            <a class="btn btn-green" href="<?php print url('profile/1');?>">Submit</a>
            <p>By submitting, you accept the Terms & Conditions</p>
          </div>
        </div>
        <!-- <a href="javascript:void(0);" id="btn-backtop">Back To Top</a> -->
      </section>
    </main>
