<?php
function project_page($node = FALSE) {
  drupal_add_js(path_to_theme().'/js/project_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(path_to_theme().'/css/project_page.css');
  $data = array();
  $project_form = drupal_get_form('project_form');
  $data['project_form'] = drupal_render($project_form);
  $output = theme('project_page',array('data'=>$data));
  return $output;
}

function project_form($form, &$form_state) {

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

function project_form_validate($form, &$form_state) {

}

function project_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
