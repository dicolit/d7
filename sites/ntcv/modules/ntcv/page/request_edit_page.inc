<?php
function request_edit_page() {

  drupal_add_js(base_path().path_to_theme().'/js/request_edit_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/request_edit_page.css');
  $data = array();
  $request_edit_form = drupal_get_form('request_edit_form');
  $data['request_edit_form'] = drupal_render($request_edit_form);
  $output = '';
  $output .= theme('request_edit_page',array('data'=>$data));
  return $output;
}

function request_edit_form($form, &$form_state) {

  $title = '';
  $form['title'] = array(
    '#type' => 'textfield',
    '#title' => 'Tên của bạn',
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $title,
    '#description' => NULL,
    '#required' => TRUE
    );

  $arr_categories = array('1'=>'Chữ đối xứng','2'=>'Chữ tượng hình');
  $category_id = 1;


  $form['category_id'] = array(
    '#type' => 'select',
    '#title' => 'Thể loại',
    '#default_value' => $category_id,
    '#options'=>$arr_categories,
    '#description' => NULL,
    '#required' => TRUE
    );

  $note = '';

  $form['note'] = array(
    '#type' => 'textarea',
    '#title' => 'Ghi chú',
    '#default_value' => $note,
    '#description' => NULL,
    '#required' => FALSE
    );

  $form['send'] = array(
    '#type' => 'submit',
    '#value' => t('Send'),
    '#attributes' => array('class'=>array('button','radius','send-btn')),
    );
  return $form;
}

function request_edit_form_validate($form, &$form_state) {
  $values = $form_state['values'];
  $title = $values['title'];
  $title = trim($title);
  $total = count(explode(' ', $title));
  $category_id = $values['category_id'];
  if($total > 1) {
    form_set_error('title', 'Vui lòng nhập tên tiếng Việt một chữ! Những yêu cầu đặc biệt vui lòng liên hệ với chúng tôi qua <a href="'.url('contact').'">Trang liên hệ</a>');
  }


  $title_upper = mb_convert_case($title, MB_CASE_UPPER, "UTF-8");
  if(strlen($title_upper) < 2) {
    form_set_error('title', 'Vui lòng nhập tên tiếng Việt một chữ và có độ dài từ 2 ký tự trở lên! Những yêu cầu đặc biệt vui lòng liên hệ với chúng tôi qua <a href="'.url('contact').'">Trang liên hệ</a>');
  }

  if($item = db_select('ntcv_request', 'nr')
    ->fields('nr',array('id','total'))
    ->condition('nr.title',$title_upper)
    ->condition('nr.category_id',$category_id)
    ->execute()
    ->fetchObject()) {
    $num_updated = db_update('ntcv_request') // Table name no longer needs {}
    ->fields(array(
      'total' => ($item->total + 1),
    ))
    ->condition('id', $item->id)
    ->execute();
    form_set_error('title', 'Tên của bạn luôn được đăng ký!');

  }

}

function request_edit_form_submit($form, &$form_state) {
  $values = $form_state['values'];
  $title = $values['title'];
  $title = trim($title);
  $title_upper = mb_convert_case($title, MB_CASE_UPPER, "UTF-8");

  $category_id = $values['category_id'];
  $created = time();
  $note = $values['note'];

  $new_id = db_insert('ntcv_request')
  ->fields(
      array(
        'title' => $title_upper,
        'category_id' => $category_id,
        'note'=>$note,
        'created' => $created,
        'total'=>1,
        'status'=>0
      )
    )
  ->execute();

  drupal_set_message('Đăng ký thành công! Chúng tôi sẽ xem xét và phản hồi bạn trong thời gian sớm nhất.');
  drupal_goto('request');
}
