<?php
function contact_us_page($node = FALSE) {
  drupal_add_js(base_path().path_to_theme().'/js/contact_us_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/contact_us_page.css');
  $data = array();
  $contact_us_form = drupal_get_form('contact_us_form');
  $data['contact_us_form'] = drupal_render($contact_us_form);
  $output = theme('contact_us_page',array('data'=>$data));
  return $output;
}

function contact_us_form($form, &$form_state) {

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

function contact_us_form_validate($form, &$form_state) {

}

function contact_us_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
