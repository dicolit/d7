<?php
global $user;
if(!user_is_logged_in()) {
  $welcome_str = 'Welcome to Dear Nestlé';
} else {
  $welcome_str = "Hi {$user->name},<br>welcome back to Dear Nestle!";
}
?>
<div class="welcome-note"><?php echo $welcome_str; ?></div>
