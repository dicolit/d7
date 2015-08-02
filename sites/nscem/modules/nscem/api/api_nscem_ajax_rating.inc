<?php
function _ajax_rating($data, $access_token)
{
  $errors = _is_valid_rating_data($data, $access_token);
  if (count($errors->msg) > 0) {
    return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, $data);
  }
  $data_save = array(
    "nid" => intval($data->nid),
    "user_id" => $GLOBALS['user']->uid,
    "value" => intval($data->value)
  );
  try {
    db_insert('nscem_rate')
      ->fields($data_save)
      ->execute();
  } catch (Exception $e) {
    return __get_json_response_data(0, $e->getMessage(), $errors->fields, $data);
  }

  return __get_json_response_data(1, 'Rating successful', $errors->fields, $data);
}

function _is_valid_rating_data($data, $access_token)
{
  if (!$data->value || $data->value > 5) {
    return (object)array('msg' => array('Rating value is invalid.'),'fields' => array('value'));
  }
  if (!user_is_logged_in()) {
    return (object)array('msg' => array('You have to login to rating.'),'fields' => array());
  }
  $nid = intval($data->nid);

  $node = node_load($nid);
  if (!$node->nid) {
    return (object)array('msg' => array('Node is invalid.'),'fields' => array('nid'));
  }
  $user_id = $GLOBALS['user']->uid;
  $result = db_select('nscem_rate', 'r')
    ->fields('r')
    ->condition('nid', $node->nid, '=')
    ->condition('user_id', $user_id, '=')
    ->execute()
    ->fetchAssoc();
  if (is_array($result) && count($result) > 0)
    return (object)array('msg' => array('You rated this item.'),'fields' => array('nid'));
  return (object)array('msg' => array(),'fields' => array());
}