            <div class="form-wrapper">
              <p class="desc">Log in with your email.</p>
              <div class="form-row">
                <label>Email</label>
                <?php print render($form['mail']);?>
              </div>
              <div class="form-row">
                <label>Password</label>
                <?php print render($form['pass']);?>
                <a class="forgot-password" href="<?php print url('forgot-password');?>">Forgot Password?</a>
              </div>
              <div class="form-action">
                <?php print render($form['submit']);?>
                <a class="btn btn-green signup-btn" href="<?php print url('sign-up');?>">I want to register new account</a>
              </div>
              <div class="separator">
                <span>or</span>
              </div>
              <div class="fb-signup">
                <p>Log in using your favourite social network</p>
                <a class="fb-signup-btn btn btn-blue" href="javascript:void(0);">Sign Up with Facebook</a>
              </div>
            </div>
            <?php print drupal_render_children($form); ?>

