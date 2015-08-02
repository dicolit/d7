<?php

function api_nscem_page() {
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Credentials: true");
  header('Access-Control-Allow-Headers: X-Requested-With');
  header('Access-Control-Allow-Headers: Content-Type');
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

  header('P3P: CP="NOI ADM DEV PSAi COM NAV OUR OTRo STP IND DEM"');
  header('Set-Cookie: SIDNAME=ronty; path=/; secure');
  header('Cache-Control: no-cache');
  header('Pragma: no-cache');

  $json_data = $_REQUEST['json_data'];

  if(!(is_string($json_data) && is_object(json_decode($json_data)) && (json_last_error() == JSON_ERROR_NONE))){
    $return_data = array('status' => -200, 'msg' => 'Invalid Json Format.');
    print  json_encode($return_data) ;
    exit;
  }

  $json_data = json_decode($json_data);

  $_data = $json_data->data;

  $action = $json_data->action;
  $func = empty($json_data->func) ? '' : $json_data->func;
  $func = preg_replace('/[^a-zA-Z0-9.]/s', '', $func);
  $_access_token = $json_data->access_token;

  $return_data = array();
  switch($action) {
    case 'get_articles_by_type':
      case 'submit_rating_cook':
      case 'submit_share_cook':
      case 'ajax_register':
      case 'ajax_login':
      case 'ajax_rating':
      case 'ajax_comment':
      case 'add_snack_box':
      include_once "api/api_nscem_{$action}.inc";
      $function_name = "_{$action}";
      $return_data = $function_name($_data, $_access_token);
      break;
    default :
      $return_data = array('status' => -100, 'msg' => 'API is not found');
      break;
  }
  if($func) {
    print $func . '(' . json_encode($return_data) . ');';
  } else {
    print json_encode($return_data);
  }
  die ;
}

function __get_json_response_data($status, $msg = '', $errors = array(), $data = array()) {
  $return = array(
    'status' => 0
    , 'msg' => ''
    , 'errors' => array()
    , 'data' => array()
  );
  $return['status'] = $status;
  if(!empty($msg)) {
    $return['msg'] = $msg;
  }
  if(!empty($errors)) {
    $return['errors'] = $errors;
  }
  if(!empty($data)) {
    $return['data'] = $data;
  }
  return $return;
}
