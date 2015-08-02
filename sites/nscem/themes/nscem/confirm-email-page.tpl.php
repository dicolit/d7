<?php if(!$data['email']):?>
  <p>Invalid token</p>
<?php else:?>
<main id="confirm-email-page" class="confirm-email-page">
  <section class="main container">
    <div class="row">
      <div class="col-sm-6 col-sm-push-3">
        <h3 class="title">Please confirm your email</h3>
        <p>A confirmation email has been sent to <a href="javascript:void(0);"><?php echo $data['email'] ?></a>. Please click on the confirmation link in the email to activate your account and receive your first 1000 points!</p>
        <p>If you can’t find the confirmation email, please check your spam mail box or let us send another email by clicking on the button below.</p>
        <?php print $data['confirm_email_form'];?>
      </div>
    </div>
  </section>
</main>
<?php endif;?>