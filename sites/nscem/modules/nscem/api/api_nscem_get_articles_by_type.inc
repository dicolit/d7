<?php

function _get_articles_by_type($data, $access_token) {
  $type = $data->type;
  $limit = intval(isset($data->limit) ? $data->limit : 10);
  $types = array('cook_detail', 'read_detail', 'move_detail', 'relax_detail');
  $items = array();
  $query = db_select('node', 'n')
      ->condition('status', 1)
      ->fields('n', array('nid'))
      ->extend('PagerDefault')
      ->limit($limit);
  if(!in_array($type, $types)) {
    $query->condition('type', array('cook', 'read', 'move', 'relax'), 'IN');
  } else {
    $query->condition('type', $type);
  }
  $query->addTag('node access');
  $nids = $query->execute()->fetchCol();
  $nodes = node_load_multiple($nids);
  foreach ($nodes as $node) {
    $field_recipe_photos = field_get_items('node', $node, 'field_recipe_photos');
    $items[] = (object) array(
      'type' => $node->type
      , 'title' => $node->title
      , 'url' => url("node/{$node->nid}")
      , 'thumbnail' => image_style_url('grid_thumbnail', $field_recipe_photos[0]['uri'])
      , 'rate' => mt_rand(1, 5)
      , 'nbo_vote' => mt_rand(1, 500)
    );
  }

  $html = '';
  foreach ($items as $item) {
    $html .= theme('grid_view_item', array('item' => $item));
  }
  return __get_json_response_data(1, NULL, NULL, array('html' => $html));
}
