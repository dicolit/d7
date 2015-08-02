<?php
function search_page() {

  drupal_add_js(base_path().path_to_theme().'/js/search_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/search_page.css');
  $data = array();
  $data['search_form'] = drupal_render(drupal_get_form('search_form'));
  $output .= theme('search_page',array('data'=>$data));
  return $output;
}

function search_form($form, &$form_state) {

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

function search_form_validate($form, &$form_state) {

}

function search_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
