<?php

/**
 * Implements hook_preprocess()
 * @param array $variables
 * @param type $hook
 */
function nscem_preprocess(&$variables, $hook) {


}

function nscem_preprocess_page(&$vars, $hook) {

}

function nscem_form_element($variables) {
  $output = '';
  switch($variables['element']['#type']) {
    case 'radios':
      //__dump($variables);
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
      __dump($variables);die;
      break;
    default:
      $output = $variables['element']['#children'];

      break;
  }

  return $output;
}

/**
 * Implements hook_css_alter()
 * @param type $css
 */
function nscem_css_alter(&$css) {

}

/**
 * Implements hook_js_alter()
 * @param type $javascript
 */
function nscem_js_alter(&$javascript) {

}

/**
 * Implements hook_process_html().
 * @param array $variables
 */
function nscem_process_html(&$vars) {

}
