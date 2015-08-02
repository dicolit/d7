<?php $cook = $data['details']; ?>
<main class="detail-page detail-cook">
  <div class="breadcrumb-container clearfix">
    <ol class="breadcrumb">
      <li><a href="<?php echo $GLOBALS['base_root'] ?>">Home</a></li>
      <li><a href="#">Cook</a></li>
      <li class="active"><?php echo $cook->title ?></li>
    </ol>
  </div>

  <section class="main container">
    <div class="row detail-info">
      <div class="col-sm-4 col-xs-12 detail-info--main-image">
        <?php $photo = $cook->photos[0];?>
        <?php if($photo->uri):?>
        <img src="<?php echo image_style_url('cook_detail', $photo->uri); ?>"
             alt="<?php echo check_plain($cook->title); ?>" class="img-responsive">
        <?php endif;?>
      </div>

      <div class="col-sm-5 col-xs-12 detail-info--desc">
        <h2><?php echo $cook->title ?></h2>

        <div class="clearfix">
          <div class="rating">
            <div class="rating--stars stars--<?php echo $cook->rating_average ?>">
              <span class="star"></span>
              <span class="star"></span>
              <span class="star"></span>
              <span class="star"></span>
              <span class="star"></span>
            </div>
            <span>(<?php echo $cook->rating_count ?>)</span>
          </div>
          <div class="comment-count">
            <img src="<?php print __get_url_theme('images/global/icon-comment.jpg') ?>" alt="">
            <span>(<?php echo $cook->comments_count ?>)</span>
          </div>
        </div>

        <div class="detail-duration detail-duration-preparation">
          <div class="heading">Difficulty level</div>
          <div class="duration">
            <div class="rating">
              <div class="rating--hats hats--<?php echo $cook->difficulty_level ?>">
                <span class="hat"></span>
                <span class="hat"></span>
                <span class="hat"></span>
                <span class="hat"></span>
                <span class="hat"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="detail-duration detail-duration-preparation">
          <div class="heading">Preparation Time</div>
          <div class="duration">
            <img src="<?php print __get_url_theme('images/global/icon-duration.png') ?>" alt="">
            <span><?php printf('%s mins', $cook->total_prep_time) ?></span>
          </div>
        </div>
      </div>

      <div class="col-sm-3 col-xs-12">
        <div class="detail-info--point-breakdown hidden-xs">
          <h5>Points Breakdown</h5>
          <?php if (!empty($cook->points_breakdown) && count(json_decode($cook->points_breakdown))): ?>
            <ul class="list-unstyled">
              <?php foreach (json_decode($cook->points_breakdown) as $key => $item): ?>
                <li class="clearfix">
                  <div class="point"><?php echo $item->point ?></div>
                  <div
                    class="point-desc<?php if (in_array($key, $cook->done_actions)) echo ' done' ?>"><?php echo $item->title ?></div>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="detail-actions">
      <ul class="list-inline text-center">
        <li><a href="javascript:void(0);" id="detail-actions--snackbox" data-node-id="<?php echo $cook->nid ?>">
            <img src="<?php print __get_url_theme('images/global/icon-detail-snackbox.png') ?>" alt="">

            <p>Snackbox</p>
          </a></li>
        <li><a href="javascript:void(0);" id="detail-actions--rate">
            <img src="<?php print __get_url_theme('images/global/icon-detail-rating.png') ?>" alt="">

            <p>Rate</p>
          </a></li>
        <li><a href="javascript:void(0);" id="detail-actions--share">
            <img src="<?php print __get_url_theme('images/global/icon-detail-share.png') ?>" alt="">

            <p>Share</p>
          </a></li>
        <li><a href="javascript:void(0);" id="detail-actions--print">
            <img src="<?php print __get_url_theme('images/global/icon-detail-print.png') ?>" alt="">

            <p>Print</p>
          </a></li>
      </ul>
    </div>

    <div class="row">
      <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-4">
            <div class="ingredients">
              <h3>Ingredients</h3>

              <p class="serving"><?php printf('Serves %s persons', $cook->how_many_it_feeds) ?></p>
              <?php if (count($cook->ingredients) > 0): ?>
                <ul class="list-unstyled">
                  <?php foreach ($cook->ingredients as $ingredient): ?>
                    <li><?php echo trim((($ingredient->quantity) ? $ingredient->quantity.' ' : '').(($ingredient->unit_name) ? $ingredient->unit_name.' ' : '').$ingredient->ingredient) ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="description">
              <h3>Directions</h3>
              <div class="description-gallery">
                <?php if (count($cook->directions['images_or_videos']) > 0): ?>
                  <ul class="list-unstyled clearfix">
                    <?php foreach ($cook->directions['images_or_videos'] as $key => $slide): ?>
                      <li class="col-sm-6">
                        <span class="icon"><?php echo $key; ?></span>
                        <img src="<?php echo image_style_url('directions_thumbnail', $slide->uri); ?>" alt="">
                      </li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
                <?php if (count($cook->directions['steps']) > 0): ?>
                  <ol>
                    <?php foreach($cook->directions['steps'] as $step):?>
                      <li><?php echo $step ?></li>
                    <?php endforeach;?>
                  </ol>
                <?php endif;?>
              </div>
            </div>
          </div>
        </div>

        <div class="comments">
          <h3><?php printf('%s comments', $cook->comments_count) ?></h3>

          <ul class="list-unstyled">
            <li class="comment-box clearfix">
              <div class="comment-box--avatar">
                <img src="<?php echo get_comment_avatar_url('comment-ava1.jpg') ?>" alt="">
              </div>
              <div class="comment-box--text">
                <textarea id="comment_content" placeholder="Click here to add your own comments"
                          data-node-id="<?php echo $cook->nid ?>"></textarea>
              </div>
            </li>
            <?php if (is_array($cook->comments) && count($cook->comments)):$user_list = array(); ?>
              <?php foreach ($cook->comments as $comment): ?>
                <li class="clearfix">
                  <div class="comment-box--avatar">
                    <?php if ($image_url = get_info_user($comment->user_id, $user_list, 'picture')): ?>
                      <img src="<?php echo $image_url ?>"/>
                    <?php endif; ?>
                  </div>
                  <div class="comment-box--text">
                    <div class="user">
                      <span class="name"><?php echo get_info_user($comment->user_id, $user_list, 'name') ?></span> <span
                        class="time timeago" title="<?php echo $comment->date ?>"></span>
                    </div>
                    <button class="btn-report-spam" data-comment-id="<?php echo $comment->cid ?>"><span></span>Report as
                      spam
                    </button>
                    <p><?php echo $comment->content ?></p>
                  </div>
                </li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="aside nutrition-info">
          <h3>Nutrition Information per serving</h3>

          <div class="info clearfix">
            <?php if ($cook->total_proteins): ?>
              <div class="detail">
                <p>Protein <span><?php echo $cook->total_proteins ?>g</span></p>
              </div>
            <?php endif; ?>
            <?php if ($cook->total_carbohydrates): ?>
              <div class="detail">
                <p>Carb <span><?php echo $cook->total_carbohydrates ?>g</span></p>
              </div>
            <?php endif; ?>
            <?php if ($cook->total_fat): ?>
              <div class="detail">
                <p>Fat <span><?php echo $cook->total_fat ?>g</span></p>
              </div>
            <?php endif; ?>
            <?php if ($cook->total_calories): ?>
              <div class="detail calo">
                <p>Energy <span><?php echo $cook->total_calories ?>kcal</span></p>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="aside product-highlight">
          <?php if (is_array($cook->related) && count($cook->related)): ?>
            <?php foreach ($cook->related as $item): ?>
              <h3><?php echo $item->name ?></h3>
              <div class="product-highlight--img">
                <img src="<?php echo get_thumbnail_url($item->image); ?>" alt="<?php echo $item->name ?>"/>
              </div>
              <p><?php echo $item->short_desc ?></p>
              <a href="javascript:void(0);" class="btn btn-green">Find out more</a>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="aside also-like">
          <h3>You may also like</h3>

          <div class="listing clearfix">
            <div class="listing--results">
              <div class="listing--list">
                <?php if (is_array($cook->cross_sell) && count($cook->cross_sell)): ?>
                  <?php foreach ($cook->cross_sell as $item): ?>
                    <div class="list-item-container col-xs-6 col-sm-12">
                      <div class="list-item">
                        <!-- <h2>Cook</h2> -->
                        <img src="<?php echo get_thumbnail_url($item->image); ?>" alt="<?php echo $item->name ?>"/>

                        <div class="list-item--info">
                          <a href="javascript:void(0);">
                            <h3><?php echo $item->name ?></h3>
                          </a>

                          <div class="rating">
                            <div class="rating--stars stars--4">
                              <span class="star"></span>
                              <span class="star"></span>
                              <span class="star"></span>
                              <span class="star"></span>
                              <span class="star"></span>
                            </div>
                            <span>(<?php echo $item->vote_count ?>)</span>
                          </div>
                          <a href="javascript:void(0);" class="add-to-snackbox" title="Add to your snack box"></a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div><?php /* end .aside .also-like */ ?>
      </div>
    </div><?php // end .row ?>
  </section>
</main>
<div class="overlay overlay-hugeinc rate-overlay">
  <button type="button" class="overlay-close">Close</button>
  <div class="overlay-perspective">
    <div class="overlay-content">
      <p class="title underline">Rate this recipe</p>

      <div class="rate-wrapper">
        <div class="stars">
          <input type="radio" name="filter-diff" class="filter-diff-1" id="filter-diff-1" value="1"/>
          <label class="filter-diff-1" for="filter-diff-1">1</label>

          <input type="radio" name="filter-diff" class="filter-diff-2" id="filter-diff-2" value="2"/>
          <label class="filter-diff-2" for="filter-diff-2">2</label>

          <input type="radio" name="filter-diff" class="filter-diff-3" id="filter-diff-3" value="3"/>
          <label class="filter-diff-3" for="filter-diff-3">3</label>

          <input type="radio" name="filter-diff" class="filter-diff-4" id="filter-diff-4" value="4"/>
          <label class="filter-diff-4" for="filter-diff-4">4</label>

          <input type="radio" name="filter-diff" class="filter-diff-5" id="filter-diff-5" value="5"/>
          <label class="filter-diff-5" for="filter-diff-5">5</label>
          <span></span>
        </div>
        <button class="btn btn-green" data-node-id="<?php echo $cook->nid ?>"
        ">Rate</button>
      </div>
    </div>
  </div>
</div>
<div class="overlay overlay-hugeinc share-overlay">
  <button type="button" class="overlay-close">Close</button>
  <div class="overlay-perspective">
    <div class="overlay-content">
      <p class="title underline">Share this recipe<strong>Baked Lemon Honey Yogurt Chicken Drumettes</strong></p>

      <div class="share-wrapper">
        <a href="javascript:void(0);" class="share-row">
          <span class="icon facebook"></span>
          <span class="title underline"
                onclick="share_facebook('<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>')">Facebook</span>
        </a>

        <div class="share-row">
          <span class="icon twitter"></span>
          <a class="title underline twitter-share-button"
             href="https://twitter.com/intent/tweet?text=&amp;url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>">Twitter</a>
        </div>
        <a href="javascript:void(0);" class="share-row">
          <span class="icon instagram"></span>
          <span class="title underline">Instagram</span>
        </a>
        <a href="javascript:void(0);" class="share-row">
          <span class="icon pinterest"></span>
          <span class="title underline">Pinterest</span>
        </a>
        <a href="javascript:void(0);" class="share-row">
          <span class="icon mail"></span>
          <span class="title underline">Email</span>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="overlay overlay-hugeinc email-overlay">
  <button type="button" class="overlay-close">Close</button>
  <div class="overlay-perspective">
    <div class="overlay-content">
      <p class="title">Email this recipe<strong>Baked Lemon Honey Yogurt Chicken Drumettes</strong></p>

      <div class="form-wrapper">
        <div class="form-row">
          <label>Recipient</label>
          <input id="recipient" type="text" class="short"/>
          <input type="hidden" id="recipient-list"/>
          <button id="addRecipient" class="btn btn-green">Add</button>
        </div>
        <div class="form-row">
          <label>Your name</label>
          <input type="text" name="name" id="email_sender_name"/>
        </div>
        <div class="form-row">
          <label>Your note (optional)</label>
          <input type="text" name="note" id="email_sender_note"/>
        </div>
        <div class="button-wrapper">
          <button class="btn btn-green cancel">Cancel</button>
          <button class="btn btn-green submit" data-node-id="<?php echo $cook->nid ?>">Send</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
/*  window.twttr = (function (d, s, id) {
    var t, js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);
    return window.twttr || (t = {
        _e: [], ready: function (f) {
          t._e.push(f)
        }
      });
  }(document, "script", "twitter-wjs"));
  twttr.ready(function (twttr) {
    twttr.events.bind('tweet', function (event) {
      // Do something there
      alert("callback");
    });
  });*/
</script>
