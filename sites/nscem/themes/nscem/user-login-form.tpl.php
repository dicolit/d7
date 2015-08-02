
    <main id="login-page" class="login-page">

      <section class="main container">
        <div class="row">
          <div class="col-sm-6 col-sm-push-3">
            <h3 class="title">Log In</h3>
            <div class="form-wrapper">
              <p class="desc">Log in with your email.</p>
              <div class="form-row">
                <label>Name</label>
                <?php print render($form['name']);?>
              </div>
              <div class="form-row">
                <label>Email</label>
                <?php print render($form['pass']);?>
                <a class="forgot-password" href="javascript:void(0);">Forgot Password?</a>
              </div>
              <div class="form-action">
                <?php print render($form['actions']['submit']);?>
                <a class="btn btn-green signup-btn" href="<?php print url('user/register');?>">I want to register new account</a>
              </div>
              <div class="separator">
                <span>or</span>
              </div>
              <div class="fb-signup">
                <p>Log in using your favourite social network</p>
                <button class="fb-signup-btn btn btn-blue">Sign Up with Facebook</button>
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
  $('#edit-pass').addClass('big');
  $('#edit-submit').addClass('btn').addClass('btn-green').addClass('login-btn');
});
</script>
