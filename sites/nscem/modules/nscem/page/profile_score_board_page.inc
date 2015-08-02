<?php
function profile_score_board_page() {

  global $user;
  $uid = $user->uid;
  drupal_add_js(base_path().path_to_theme().'/js/profile_score_board_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/profile_score_board_page.css');
  $data = array();

  $account = (object)array(
    'name'=>'Amanda 001',
    'thumb'=>'<img src="'.base_path().path_to_theme().'/images/dummy/account-img.png"/>',
    );

  $data['account'] = $account;

  $tabs = array();
  $tabs[] = (object)array(
    'title'=>'Dashboard',
    'href'=>url('profile/'.$uid.'/dashboard'),
    'is_actived'=>0,
    'class'=>'dashboard',
    );
  $tabs[] = (object)array(
    'title'=>'Account',
    'href'=>url('profile/'.$uid.'/account'),
    'is_actived'=>0,
    'class'=>'account',
    );
  $tabs[] = (object)array(
    'title'=>'Rewards',
    'href'=>url('profile/'.$uid.'/rewards'),
    'is_actived'=>0,
    'class'=>'rewards',
    );
  $tabs[] = (object)array(
    'title'=>'Score Board',
    'href'=>url('profile/'.$uid.'/score-board'),
    'is_actived'=>1,
    'class'=>'score',
    );
  $data['tabs'] = $tabs;
  //$profile_score_board_form = drupal_get_form('profile_score_board_form');
  $data['profile_score_board_form'] = drupal_render($profile_score_board_form);
  $output = theme('profile_score_board_page',array('data'=>$data));
  return $output;
}

function profile_score_board_form($form, &$form_state) {

  $email = '';
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Your Email'),
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $email,
    '#description' => NULL,
    '#required' => FALSE
    );

  $form['send'] = array(
    '#type' => 'submit',
    '#value' => t('Send'),
    '#attributes' => array('class'=>array('yellow-btn','send-btn')),
    );
  return $form;
}

function profile_score_board_form_validate($form, &$form_state) {

}

function profile_score_board_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
