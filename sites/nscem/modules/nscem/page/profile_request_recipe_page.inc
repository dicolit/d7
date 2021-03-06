<?php

function profile_request_recipe_page()
{

  $data = array();
  drupal_add_js(base_path() . path_to_theme() . '/js/profile_request_recipe_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path() . path_to_theme() . '/css/profile_request_recipe_page.css');
  $profile_request_recipe_form = drupal_get_form('profile_request_recipe_form');
  $data['profile_request_recipe_form'] = drupal_render($profile_request_recipe_form);
  $output = theme('profile_request_recipe_page', array('data' => $data));
  return $output;
}


function profile_request_recipe_form($form, &$form_state)
{
  $mail = '';
  $form['mail'] = array(
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#size' => 30,
    '#maxlength' => 50,
    '#default_value' => $mail,
    '#description' => NULL,
    '#required' => TRUE,
    '#no_wrapper' => true,
  );

  $pass = '';
  $form['pass'] = array(
    '#type' => 'password',
    '#title' => t('Password'),
    '#size' => 50,
    '#default_value' => $pass,
    '#required' => TRUE,
    '#no_wrapper' => true,

  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Log In'),
    //'#attributes' => array('class'=>array('yellow-btn','send-btn')),
  );

  return $form;
}

function profile_request_recipe_form_validate($form, &$form_state)
{
  form_set_error('mail', 'BBBB');
  form_set_error('pass', 'CCCC');
  form_set_error('submit', 'DDDD');
}

function profile_request_recipe_form_submit($form, &$form_state)
{

}
