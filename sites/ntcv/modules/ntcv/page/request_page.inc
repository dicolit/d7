<?php
function request_page() {

  drupal_add_js(path_to_theme().'/js/request_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(path_to_theme().'/css/request_page.css');
  $data = array();
  //$request_form = drupal_get_form('request_form');
  //$data['request_form'] = drupal_render($request_form);
  $query = db_select('ntcv_request', 'nr')->extend('PagerDefault')->extend('TableSort');

  $arr = $query
    ->fields('nr',array('id','title','category_id','created','status','total'))
    ->limit(10)
    ->orderBy('nr.created','DESC')
    ->execute()
    ->fetchAll();
  $items = array();
  foreach($arr as $key=>$value) {
    $item = new stdClass();
    $item->title = $value->title;
    $category_name = 'Chữ đối xứng';
    if($value->category_id == 2) {
      $category_name = 'Chữ tượng hình';
    }

    $item->category_name = $category_name;
    $item->total = $value->total;
    $item->created = date('Y/m/d H:i:s',$value->created);
    $items[] = $item;
  }

  $data['items'] = $items;
  $output = '';
  $output .= theme('request_page',array('data'=>$data));
  $output .= theme('pager');
  return $output;
}
/*
function request_form($form, &$form_state) {

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

function request_form_validate($form, &$form_state) {

}

function request_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
*/
