    <main id="signup-page" class="signup-page">

      <section class="main container">
        <div class="row">
          <div class="col-sm-4 col-sm-push-6">
            <h3 class="title">Sign Up</h3>
          </div>
          <div class="clearfix"></div>
          <div class="col-sm-8 col-sm-push-2">
            <div class="row">
              <div class="col-sm-6">
                <div class="promote-msg">
                  <div class="point">
                    <p>+1000</p>
                  </div>
                  <span>Sign up to receive your first <strong>1000 points!</strong></span>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-wrapper">
                  <p class="desc">Sign up with your email</p>
                  <div class="form-row">
                    <label>Name</label>
                    <?php print render($form['account']['name']);?>
                  </div>
                  <div class="form-row">
                    <label>Email</label>
                    <?php print render($form['account']['mail']);?>
                  </div>
                  <div class="form-action">
                    <?php print render($form['actions']['submit']);?>
                    <button class="btn btn-green login-btn">I have an account</button>
                  </div>
                  <div class="separator">
                    <span>or</span>
                  </div>
                  <div class="fb-signup">
                    <p>Sign up using your favourite social network</p>
                    <button class="fb-signup-btn btn btn-blue">Sign Up with Facebook</button>
                    <p>By signing up, you accept the <a href="javascript:void(0)">Term &amp; Conditions</a> and acknowledge our <a href="javascript:void(0)">Privacy Policy</a></p>
                  </div>
                </div>
              </div>
            </div>

          </div>


        </div>
      </section>
    </main>


<?php print drupal_render_children($form); ?>
<script>
jQuery(document).ready(function(){
  $('#edit-name').addClass('big');
  $('#edit-mail').addClass('big');
  $('#edit-submit').addClass('btn').addClass('btn-green').addClass('signup-btn');
});
</script>
