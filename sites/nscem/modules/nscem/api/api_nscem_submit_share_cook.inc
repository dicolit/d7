<?php
function _submit_share_cook($data, $access_token){
    $errors = _is_valid_share_data_cook($data, $access_token);
    if(count($errors->msg) > 0){
        return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, $data);
    }
    $network = $data->network;
    $function_name = "_share_{$network}_cook";
    $share_result = $function_name($data);
    if($share_result->status){
        return __get_json_response_data(1,'Success',$errors->fields,$data);
    }
    return __get_json_response_data(0,'Fail',$errors->fields,$data);
}

function _is_valid_share_data_cook($data, $access_token){
  $msg = array();
  $fields = array();
  /* TODO Check logged in user and user reviewed current cook */
  if(!$data->nid){
    $msg[] = t('Invalid cook id');
  } else {
    $node = node_load(intval($data->nid));
    if(!$node || !$node->nid){
      $msg[] = 'The cook is not exist.';
      $fields[] = 'nid';
    }
  }
  if(!in_array($data->network,array('facebook','twitter','email'))){
    $msg[] = 'Invalid network';
    $fields[] = 'network';
  } else {
    $function_name = "_is_valid_{$data->network}_data";
    //$errors = array_merge($msg, $function_name($data));
    $sub_errors = $function_name($data);
    $msg = array_merge($msg,$sub_errors->msg);
    $fields = array_merge($fields,$sub_errors->fields);
  }

  return (object)array('msg' => $msg, 'fields' => $fields);
}

function _is_valid_email_data($data){
  $msg = array();
  $fields = array();
  if(!$data->emails){
    $msg[] = 'The recipient emails are required.';
    $fields[] = 'emails';
  } else {
    $emails = explode(',',trim($data->emails,','));
    foreach($emails as $email){
      if(!valid_email_address($email)){
        $msg[] = 'Invalid email';
        $fields[] = 'emails';
        break;
      }
    }
  }

  if(!$data->name){
    $msg[] = 'The name is required.';
    $fields[] = 'name';
  }

  if(!$data->note){
    $msg[] = 'The note is required.';
    $fields[] = 'note';
  }

  return (object)array('msg' => $msg, 'fields' => $fields);
}

/**
 * @param object $data
 */
function _share_facebook_cook($data){

}

function _share_email_cook($data){
    $emails = explode(',',trim($data->emails,','));
    foreach($emails as $email){
        drupal_mail('nscem_share_cook','email_share_cook',$email,language_default(),array('note' => $data->note, 'name' => $data->name));
    }
    return (object)array('status' => 1);
}

/**
 * Implements hook_mail().
 */
function nscem_share_cook_mail($key, &$message, $params) {
    $message['subject'] = "Email to a friend";
    $message['body'] = array();
    $message['body'][] = "Sender name : {$params['name']}, note : {$params['note']}";
}