<?php
function move_detail_page() {
  drupal_add_js(base_path().path_to_theme().'/js/move_detail_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/move_detail_page.css');
  $data = array();
  //$move_detail_form = drupal_get_form('move_detail_form');
  //$data['move_detail_form'] = drupal_render($move_detail_form);
  $output = theme('move_detail_page',array('data'=>$data));
  return $output;
}

function move_detail_form($form, &$form_state) {

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

function move_detail_form_validate($form, &$form_state) {

}

function move_detail_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
