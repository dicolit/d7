<?php
function category_page() {
    /*drupal_add_js(base_path().path_to_theme().'/js/cook_page.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_css(base_path().path_to_theme().'/css/cook_page.css');*/
    /*drupal_add_js(base_path().path_to_theme().'/js/vendor.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(base_path().path_to_theme().'/js/plugin.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js(base_path().path_to_theme().'/js/main.js', array('type' => 'file', 'scope' => 'footer'));*/
    $data = array(
        'current_filters' => get_current_filters(),
        'filter_form'   =>  drupal_render(drupal_get_form('category_filter_form')),
        'item_list' => get_item_list()
    );
    //$data['cook_form'] = drupal_render(drupal_get_form('cook_form'));

    $output = theme('category_page',array('data'=>$data));
    return $output;
}

function get_image_url($img_name, $type = 'cook', $style = 'thumbnail'){
    return 'http://lorempixel.com/241/169/food/' . mt_rand(1, 10) . '/';
    //return image_style_url($style,file_build_uri($type.'/'.$img_name));
}

function get_thumbnail_url($img_name, $type = 'cook'){
    return get_image_url($img_name, $type, 'thumbnail');
}

function get_detail_url($cook){
    return $GLOBALS['base_root'].'/cook/'.$cook->url_key;
}

/**
 * Get the list of item.
 *
 * @return array. Ex : array( Object('name', 'url_key' 'image', 'rating_sum', 'recommended', 'vote_count', 'type'), Object('name', 'url_key', 'image', 'rating_sum', 'recommended', 'vote_count', 'type'), ...)
 */
function get_item_list(){
    /* Filter item list by current filter */
    return array(
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'cook'),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'read'),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'move'),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'relax'),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'cook'),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'read'),
    );
}

function category_filter_form($form, &$form_state) {
//print_r($_GET);exit;
    $form['send'] = array(
        '#type' => 'reset',
        '#value' => t('Reset All')
    );

    $form['occasion'] = array(
        '#type' => 'select',
        '#title' => t('Occasion'),
        '#required' => FALSE,
        '#attributes' => array(
            'id' => 'filter-occasion',
            'class'   =>  'form-control'
        ),
        '#options'  => array_merge(array('' => t('Select your occasion')),get_occasion()),
        '#default_value'=> isset($_GET['occasion']) ? $_GET['occasion'] : '',
        '#no_wrapper' =>  1
    );

    $form['keywords'] = array(
        '#type' => 'textfield',
        '#title' => t('Key Words'),
        '#required' => FALSE,
        '#attributes' => array(
          'id' => 'filter-keywords',
          'class'   =>  'form-control',
          'placeholder' =>  t('Type in your keywords')
        ),
        '#default_value'=> isset($_GET['keywords']) ? $_GET['keywords'] : '',
        '#no_wrapper' =>  1
    );

    form_checkboxes_register($form,'ingredients',get_main_ingredients(),'filter-mi');
    form_checkboxes_register($form,'brands',get_nestle_brands(),'filter-mi-nestle');
    form_checkboxes_register($form,'plus_ingredients',get_plus_ingredients(),'filter-mi');
    $form['#method'] = 'get';
  return $form;
}

function category_form_validate($form, &$form_state) {

}

function category_form_submit($form, &$form_state) {

}

function get_current_filters(){

}

function get_occasion(){
    return array();
}

function form_checkboxes_register(&$form, $prefix_name, $options, $label_for_prefix = ''){
    $current_filters = (isset($_GET[$prefix_name]) && is_array($_GET[$prefix_name])) ? $_GET[$prefix_name] : array();
    foreach($options as $value => $label){
        $form[$prefix_name.'['.$value.']'] = array(
            '#type' =>  'checkbox',
            '#title'    =>  t($label),
            '#override' => 1,
            //'#options'  => get_main_ingredients(),
            '#no_wrapper' =>  1,
            '#return_value'    =>  $value
        );
        if(in_array($value,$current_filters)){
            $form[$prefix_name.'['.$value.']']['#attributes'] = array('checked' => 'checked');
        }

        if($label_for_prefix != ''){
            $form[$prefix_name.'['.$value.']']['#label_for'] = 'filter-mi-'.$value;
        }
    }
    $form['#data'][$prefix_name] = $options;
}

function get_main_ingredients(){
    return array(
        'fruit' => 'Fruit',
        'vegetables'    =>  'Vegetables',
        'meat'  =>  'Meat',
        'legumes-bean'  =>  'Legumes &amp; Beans',
        'dairy' =>  'Dairy',
        'graines'   =>  'Graines',
        'rice'  =>  'Rice',
        'seafood'   =>  'Seafood',
        'noddle-pasta'  =>  'Noddle &amp; Pasta'
    );
}

function get_plus_ingredients(){
    return array(
        'maggi' => 'Maggi',
        'nestle-bliss'    =>  'Nestle Bliss',
        'nestle-ice-ream '  =>  'Nestle Ice Cream',
        'nestle-kit-kat'  =>  'Nestle Kit Kat',
        'purina-petcare-alpo' =>  'Purina Petcare Alpo',
        'purina-petcare-friskies' =>  'Purina Petcare Friskies',
        'nestle-nutrien'  =>  'Nestle Nutrien',
        'nestle-sjora'   =>  'Nestle Sjora',
        'nestle-yogurt'  =>  'Nestle Yogurt'
    );
}

function get_nestle_brands(){
    return array(
        'junior-club' => 'Nestle Junior Club',
        'nespray'   =>  'Nespray',
        'low-fat-milk'  =>  'Nestle Low Fat Milk',
        'omega-plus'    =>  'Nestle Omega Plus',
        'breakfast' =>  'Nestle Breakfast Cereal',
        'nestum'    =>  'Nestum',
        'coffee-made'   =>  'Coffee Made',
        'milo'  =>  'Milo',
        'nescafe'   =>  'Nescafe',
        'nescafe-dolce-gusto'   =>  'Nescage Dolce Gusto'
    );
}
