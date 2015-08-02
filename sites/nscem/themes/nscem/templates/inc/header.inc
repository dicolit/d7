<?php
global $user;
if($user->uid>0) {
  include_once 'header_4user.inc';
} else {
  include_once 'header_4guess.inc';
}
