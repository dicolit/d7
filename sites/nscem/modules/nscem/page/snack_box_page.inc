<?php
function snack_box_page() {
    $data = array(
        'item_list'     =>  get_snack_box_items(),
        'cross_sell'    =>  get_cross_sell_items()
    );
    return theme('snack_box_page',array('data' => $data));
}

function get_snack_box_items(){
    return array(
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'cook', 'earn_point' => 500, 'max_point' => 750),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'read','earn_point' => 750, 'max_point' => 750),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'move','earn_badge'  =>  0, 'max_badge'  =>  2),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'relax','earn_point' => 0, 'max_point' => 750),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'cook','earn_point' => 500, 'max_point' => 750),
        (object)array('name' => 'Chicken Breats with Balsamic Vinegar and Garlic','url_key' => 'chicken-breats','image' => 'cook.jpg', 'rating_sum' => '4.5', 'recommended' => '1', 'vote_count' => '20','type' => 'read','earn_point' => 500, 'max_point' => 750),
    );
}

function get_image_url($img_name, $type = 'cook', $style = 'thumbnail'){
    return 'http://lorempixel.com/241/169/food/' . mt_rand(1, 10) . '/';
    //return image_style_url($style,file_build_uri($type.'/'.$img_name));
}

function get_thumbnail_url($img_name, $type = 'cook'){
    return get_image_url($img_name, $type, 'thumbnail');
}

function get_process_percent($item){
    if($item->type == 'move'){
        return ($item->earn_badge/$item->max_badge)*100;
    }
    return ($item->earn_point/$item->max_point)*100;
}

/**
 * Get cross-sell items
 *
 * @return array
 */
function get_cross_sell_items(){
    return array(
        (object)array(
            'name'  =>  'Green Tea Cake',
            'image' =>  'green-tea.jpg',
            'rating_sum'    =>  3,
            'vote_count'    =>  20,
            'url_key'   =>  'green-tea',
            'label' =>  'SPECIAL SNACK FOR HARI RAYA 2015',
            'earn_point'    =>  500,
            'max_point' =>  700,
            'type'  =>  'cook'
        ),
        (object)array(
            'name'  =>  'Paleo Sunflower Banana Bread',
            'image' =>  'banana-bread.jpg',
            'rating_sum'    =>  3,
            'vote_count'    =>  20,
            'url_key'   =>  'banana-bread',
            'label' =>  'SPECIAL SNACK FOR HARI RAYA 2015',
            'earn_point'    =>  500,
            'max_point' =>  700,
            'type'  =>  'read'
        )
    );
}
