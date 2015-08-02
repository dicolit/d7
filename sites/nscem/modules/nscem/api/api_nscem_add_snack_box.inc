<?php
function _add_snack_box($data, $access_token)
{
  $errors = _is_valid_snack_box_data($data, $access_token);
  if (count($errors->msg) > 0) {
    return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, $data);
  }
  $data_save = array(
    "nid" => intval($data->nid),
    "uid" => $GLOBALS['user']->uid,
  );
  try {
    db_insert('nscem_snack_box')
      ->fields($data_save)
      ->execute();
  } catch (Exception $e) {
    return __get_json_response_data(0, $e->getMessage(), $errors->fields, $data);
  }

  return __get_json_response_data(1, 'Add to snack box successful', $errors->fields, $data);
}

function _is_valid_snack_box_data($data, $access_token)
{
  if (!user_is_logged_in()) {
    return (object)array('msg' => array('You must login to add to snack box.'),'fields' => array());
  }
  $nid = intval($data->nid);

  $node = node_load($nid);
  if (!$node->nid) {
    return (object)array('msg' => array('Node is invalid'),'fields' => array('nid'));
  }
  $user_id = $GLOBALS['user']->uid;
  $result = db_select('nscem_snack_box', 'sb')
    ->fields('sb')
    ->condition('nid', $node->nid, '=')
    ->condition('uid', $user_id, '=')
    ->execute()
    ->fetchAssoc();
  if (is_array($result) && count($result) > 0)
    return (object)array('msg' => array('You added this item to snack box.'),'fields' => array('nid'));
  return (object)array('msg' => array(),'fields' => array());
}