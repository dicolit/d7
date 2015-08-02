<?php

function relax_page() {
  drupal_add_js(base_path().path_to_theme().'/js/relax_page.js', array('scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/relax_page.css');

  $data = array();

  $categories = array();
  $categories['1'] = (object)array(
    'id'=>1,
    'name'=>'Cook',
    'url'=>url('cook/'.rand(1,100))
    );
  $categories['2'] = (object)array(
    'id'=>2,
    'name'=>'Read',
    'url'=>url('read/'.rand(1,100))
    );
  $categories['3'] = (object)array(
    'id'=>3,
    'name'=>'Move',
    'url'=>url('move/'.rand(1,100))
    );
  $categories['4'] = (object)array(
    'id'=>4,
    'name'=>'Relax',
    'url'=>url('relax/'.rand(1,100))
    );

  $data['categories'] = $categories;

  $items = array();
  for($i=0;$i<8;$i++) {
    $rand = 4;//rand(1,4);
    $category = $categories[$rand];
    $items[] = (object)array(
      'category_id'=>$category->id,
      'category_name'=>$category->name,
      'is_added'=>rand(0,1),
      'is_recommended'=>rand(0,1),
      'has_video'=>rand(0,1),
      'thumbnail'=>'<img src="'.base_path().path_to_theme().'/images/dummy/list1.jpg">',
      'title'=>'10-Chicken Breasts with Balsamic Vinegar and Garlic',
      'href'=>$category->url,
      'stars'=>rand(1,5),
      'rated_total'=>rand(0,100),
      );
  }
  $data['items'] = $items;

  $output = theme('relax_page',array('data'=>$data));
  return $output;
}
