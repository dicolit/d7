<?php
function service_detail_page($node = FALSE) {
  drupal_add_js(base_path().path_to_theme().'/js/service_detail_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/service_detail_page.css');
  $data = array();
  $service_detail_form = drupal_get_form('service_detail_form');
  $data['service_detail_form'] = drupal_render($service_detail_form);
  $output = theme('service_detail_page',array('data'=>$data));
  return $output;
}

function service_detail_form($form, &$form_state) {

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

function service_detail_form_validate($form, &$form_state) {

}

function service_detail_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
