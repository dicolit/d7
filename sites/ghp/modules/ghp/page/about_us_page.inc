<?php
function about_us_page($node = FALSE) {
  drupal_add_js(base_path().path_to_theme().'/js/about_us_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/about_us_page.css');
  $data = array();
  $about_us_form = drupal_get_form('about_us_form');
  $data['about_us_form'] = drupal_render($about_us_form);
  $output = theme('about_us_page',array('data'=>$data));
  return $output;
}

function about_us_form($form, &$form_state) {

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

function about_us_form_validate($form, &$form_state) {

}

function about_us_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
