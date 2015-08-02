<?php
function client_page($node = FALSE) {
  drupal_add_js(path_to_theme().'/js/client_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(path_to_theme().'/css/client_page.css');
  $data = array();
  $client_form = drupal_get_form('client_form');
  $data['client_form'] = drupal_render($client_form);
  $output = theme('client_page',array('data'=>$data));
  return $output;
}

function client_form($form, &$form_state) {

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

function client_form_validate($form, &$form_state) {

}

function client_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
