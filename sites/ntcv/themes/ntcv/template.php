<?php

function ntcv_form_element($variables) {
  //print '<pre>';
  //print_r($variables);
  //die;

  $output = '';
  switch($variables['element']['#type']) {
    case 'radios':
      $output = '<div class="rows">';
      $n = count($variables['element']['#options']);
      $t = 12;
      if($n>0) {
        $t = (int)(12/$n);
      }
      foreach($variables['element']['#options'] as $key=>$value) {

        $output.='
        <div class="large-'.$t.' medium-'.$t.' small-12 columns no-padding">
          <div class="radio-wrapper">
            '.$variables['element'][$key]['#children'].'
          </div>
          <label for="'.$variables['element'][$key]['#id'].'">'.$value.'</label>
        </div>';
      }
      $output .= '</div>';
      break;
    case 'captcha':
      //__dump($variables);die;
      break;
    default:

      $output = '
      <div class="row collapse">
        <div class="large-12 columns">
          <label>'.$variables['element']['#title'].($variables['element']['#required'] ? ' *':'').'</label>
          '.$variables['element']['#children'].'
          </div>
      </div>';

      break;
  }

  return $output;
}
