<?php

function sign_up_page() {


  drupal_add_js(base_path() . path_to_theme() . '/js/sign_up_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path() . path_to_theme() . '/css/sign_up_page.css');

  $data = array();
  //$sign_up_form = drupal_get_form('sign_up_form');
  //$data['sign_up_form'] = drupal_render($sign_up_form);
  //print 'abc1';die;
  return theme('sign_up_page', array('data' => $data));
}

function sign_up_form($form, &$form_state)
{

  $name = '';
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#size' => 30,
    '#maxlength' => 50,
    '#default_value' => $name,
    '#description' => NULL,
    '#required' => false,
    '#no_wrapper' => true,
    '#attributes' =>  array(
      'class' =>  array('big')
    )
  );
  $mail = '';
  $form['mail'] = array(
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#size' => 30,
    '#maxlength' => 50,
    '#default_value' => $mail,
    '#description' => NULL,
    '#required' => false,
    '#no_wrapper' => true,
    '#attributes' =>  array(
      'class' =>  array('big')
    )
  );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Send'),
    '#attributes' => array('class' => array('yellow-btn', 'send-btn')),
  );

  return $form;
}


function sign_up_form_validate($form, &$form_state) {

}



function sign_up_form_submit($form, &$form_state)
{

}

