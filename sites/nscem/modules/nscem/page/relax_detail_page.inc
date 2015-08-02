<?php
function relax_detail_page() {

  drupal_add_js(base_path().path_to_theme().'/js/relax_detail_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/relax_detail_page.css');
  $data = array();
  $relax_detail_form = drupal_get_form('relax_detail_form');
  $data['relax_detail_form'] = drupal_render($relax_detail_form);
  $output = theme('relax_detail_page',array('data'=>$data));
  return $output;
}

function relax_detail_form($form, &$form_state) {

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

function relax_detail_form_validate($form, &$form_state) {

}

function relax_detail_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
