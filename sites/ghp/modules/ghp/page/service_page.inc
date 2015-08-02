<?php
function service_page($node = FALSE) {
  drupal_add_js(path_to_theme().'/js/service_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(path_to_theme().'/css/service_page.css',array('group' => CSS_DEFAULT, 'every_page' => FALSE));
  $data = array();
  $service_form = drupal_get_form('service_form');
  $data['service_form'] = drupal_render($service_form);
  $output = '';
  $output .= theme('service_page',array('data'=>$data));
  return $output;
}

function service_form($form, &$form_state) {

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

function service_form_validate($form, &$form_state) {

}

function service_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
