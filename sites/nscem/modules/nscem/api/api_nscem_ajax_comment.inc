<?php
function _ajax_comment($data, $access_token)
{
  $action = $data->action;
  if($action == 'add_comment'){ /* Add new comment */
    $errors = _is_valid_comment_data($data, $access_token);
    if (count($errors->msg) > 0) {
      return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, $data);
    }

    $data_save = array(
      "nid" => intval($data->nid),
      "user_id" => $GLOBALS['user']->uid,
      "date" => format_date(time(), 'custom', 'Y-m-d H:i:s'),
      "status"  =>  1,
      "content" =>  nl2br(htmlspecialchars($data->content))
    );

    try {
      db_insert('nscem_comment')
        ->fields($data_save)
        ->execute();
    } catch (Exception $e) {
      return __get_json_response_data(0, $e->getMessage(), $errors->fields, $data);
    }
    return __get_json_response_data(1, 'Comment success', $errors->fields, $data);
  } elseif($action == 'report_spam'){ /* Report spam */
    $errors = _is_valid_report_data($data, $access_token);
    if (count($errors->msg) > 0) {
      return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, $data);
    }

    $data_save = array(
      "cid" => intval($data->cid),
      "user_report_id"  =>  $GLOBALS['user']->uid,
      "date" => format_date(time(), 'custom', 'Y-m-d H:i:s')
    );

    try {
      db_insert('nscem_comment_report_spam')
        ->fields($data_save)
        ->execute();
    } catch (Exception $e) {
      return __get_json_response_data(0, $e->getMessage(), $errors->fields, $data);
    }
    return __get_json_response_data(1, 'Report spam successful', $errors->fields, $data);
  } else {
    return __get_json_response_data(0, 'Nothing to do', array(), $data);
  }
}

function _is_valid_comment_data($data, $access_token)
{
  if (!user_is_logged_in()) {
    return (object)array('msg' => array('You have to login to comment.'),'fields' => array());
  }

  if (!$data->content) {
    return (object)array('msg' => array('Please enter the content of comment.'),'fields' => array('content'));
  }

  $nid = intval($data->nid);

  $node = node_load($nid);
  if (!$node->nid) {
    return (object)array('msg' => array('Node is invalid'),'fields' => array('nid'));
  }
  return (object)array('msg' => array(),'fields' => array());
}

function _is_valid_report_data($data, $access_token){
  if (!user_is_logged_in()) {
    return (object)array('msg' => array('You have to login to report.'),'fields' => array());
  }

  if (!$data->cid) {
    return (object)array('msg' => array('Please specify comment id.'),'fields' => array('cid'));
  }

  $user_id = $GLOBALS['user']->uid;
  $result = db_select('nscem_comment_report_spam', 'r')
    ->fields('r')
    ->condition('cid', $data->cid, '=')
    ->condition('user_report_id', $user_id, '=')
    ->execute()
    ->fetchAssoc();

  if (is_array($result) && count($result) > 0)
    return (object)array('msg' => array('You reported this comment.'),'fields' => array('cid'));
  return (object)array('msg' => array(),'fields' => array());
}