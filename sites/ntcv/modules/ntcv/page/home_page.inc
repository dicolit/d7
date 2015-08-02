<?php
function home_page($node=FALSE) {
  $data = array();
  $hot_items = _get_hot_items();
  $data['hot_items'] = $hot_items;
  return theme('home_page',array('data'=>$data));
}
function _get_hot_items() {
  $hot_items = array();
  $arr = db_select('node','n')
    ->fields('n',array('nid'))
    //->limit(8)
    ->range(0, 6)
    ->orderBy('n.created','DESC')
    ->condition('n.type','project_detail')
    ->condition('n.status',1)
    ->execute()
    ->fetchAll();
  foreach($arr as $value) {
    $node = node_load($value->nid);
    //__dump($node);die;
    $item = new stdClass();
    $item->href = url('node/'.$node->nid);
    $item->thumb = __get_field_value($node->field_image,'image',array('imagestyle'=>'home_thumb'));
    $hot_items[] = $item;
  }
  return $hot_items;
}
