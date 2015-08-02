<?php
function home_page($node = FALSE) {
  drupal_add_js(path_to_theme().'/js/home_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(path_to_theme().'/css/home_page.css');
  $data = array();
  $home_form = drupal_get_form('home_form');
  $data['home_form'] = drupal_render($home_form);
  $output = theme('home_page',array('data'=>$data));
  return $output;
}

function home_form($form, &$form_state) {

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
    '#attributes' => array('class'=>array()),
    );
  return $form;
}

function home_form_validate($form, &$form_state) {

}

function home_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
