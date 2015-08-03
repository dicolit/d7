<?php
function contact_us_page($node = FALSE) {
  drupal_add_js(path_to_theme().'/js/contact_us_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(path_to_theme().'/css/contact_us_page.css');
  $data = array();
  $contact_us_form = drupal_get_form('contact_us_form');

  $data['title'] = $node->title;
  $data['body'] = __get_field_value($node->body);
  $data['map_url'] = __get_field_value($node->field_image,'file_url');
  $data['contact_us_form'] = drupal_render($contact_us_form);
  $output = theme('contact_us_page',array('data'=>$data));
  return $output;
}

function contact_us_form($form, &$form_state) {
  $name = '';
  $email = '';
  $subject = '';
  $content = '';
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => 'Tên của bạn',
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $name,
    '#description' => NULL,
    '#required' => TRUE
    );
  $form['email'] = array(
    '#type' => 'textfield',
    '#title' => 'Địa chỉ email',
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $email,
    '#description' => NULL,
    '#required' => TRUE
    );
  $form['subject'] = array(
    '#type' => 'textfield',
    '#title' => 'Tiêu đề',
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $subject,
    '#description' => NULL,
    '#required' => TRUE
    );
  $form['content'] = array(
    '#type' => 'textarea',
    '#title' => 'Nội dung',
    '#default_value' => $content,
    '#description' => NULL,
    '#required' => TRUE
    );
  $form['send'] = array(
    '#type' => 'submit',
    '#value' => t('Send'),
    '#attributes' => array('class'=>array()),
    );
  return $form;
}

function contact_us_form_validate($form, &$form_state) {
  $values = $form_state['values'];
  $name = $values['name'];
  $email = $values['email'];
  $subject = $values['subject'];
  $content = $values['content'];

  if(!__is_valid_email($email)) {
    form_set_error('email', 'Email không hợp lệ!');
  }
  //form_set_error('email', 'abc');
}

function contact_us_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  $name = $values['name'];
  $email = $values['email'];
  $subject = $values['subject'];
  $content = $values['content'];
  $options = array(
    'name'=>$name,
    'email'=>$email,
    'subject'=>$subject,
    'content'=>$content,
    'uid'=>0,
    'created'=>time(),
    'ip_address'=>ip_address()
    );
  db_insert('ghp_contact')
  ->fields($options)
  ->execute();
  drupal_set_message('Cảm ơn bạn đã gửi thông tin! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất!');
  drupal_goto('<front>');
}
