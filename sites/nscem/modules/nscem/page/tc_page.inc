<?php
function tc_page() {

  drupal_add_js(base_path().path_to_theme().'/js/tc_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/tc_page.css');
  $data = array();
  $tc_form = drupal_get_form('tc_form');
  $data['tc_form'] = drupal_render($tc_form);
  $output = theme('tc_page',array('data'=>$data));
  return $output;
}

function tc_form($form, &$form_state) {

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

function tc_form_validate($form, &$form_state) {

}

function tc_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
