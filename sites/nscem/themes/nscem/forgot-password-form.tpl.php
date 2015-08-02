            <div class="form-wrapper">
              <p class="desc">Please enter your emial address below and follow the simple instruction.</p>
              <div class="form-row">
                <label>Email</label>
                <?php print render($form['name']);?>
              </div>

              <div class="form-action">
                <?php print render($form['submit']);?>
              </div>
            </div>
            <?php print drupal_render_children($form); ?>
