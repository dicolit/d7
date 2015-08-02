<?php

function admin_nscem_config_page($form, &$form_state) {
  $form['slide-fieldset'] = array(
    '#type' => 'fieldset'
    , '#title' => 'Slide'
    , '#collapsible' => TRUE
    , '#collapsed' => FALSE
    , '#prefix' => '<div id="slide-fieldset-wrapper">'
    , '#suffix' => '</div>'
  );

  $slides = NULL;
  if (empty($form_state['num_slide_count'])) {
    $form_state['num_slide_count'] = 1;
    $sql = "SELECT value FROM nscem_variables WHERE key='slide';";
    $slides = db_query($sql)->fetchField();
    if(!empty($slides)) {
      $slides = json_decode($slides);
    }
  }
  if(!empty($slides)) {
    $form_state['num_slide_count'] = count($slides);
  }
  for ($i = 0; $i < $form_state['num_slide_count']; $i++) {
    $form['slide-fieldset'][$i] = array(
      '#type' => 'managed_file'
      , '#title' => 'Background ' . ($i + 1)
      , '#default_value' => isset($slides[$i]) ? $slides[$i]->fid : NULL
      , '#upload_location' => 'public://slides/' . date('Y') . '/' . date('m')
      // , '#required' => TRUE
    );
  }
  $form['slide-fieldset']['add_slide'] = array(
    '#type' => 'submit'
    , '#value' => 'Add another background'
    , '#submit' => array('slides_add_more_add_one')
    , '#limit_validation_errors' => array()
    , '#ajax' => array(
      'callback' => 'slides_add_more_callback'
      , 'wrapper' => 'slide-fieldset-wrapper'
    )
  );
  $form['submit'] = array('#type' => 'submit', '#value' => 'Save');
  return $form;
}

function admin_nscem_config_page_submit($form, &$form_state) {
  $slides = array();
  for($i = 0; $i < $form_state['num_slide_count']; $i++) {
    $file = $form_state['complete form']['slide-fieldset'][$i]['#file'];
    $slides[] = array('fid' => $file->fid, 'uri' => $file->uri);
  }
  $sql = "SELECT COUNT(*) FROM nscem_variables WHERE key='slide';";
  $exist = intval(db_query($sql)->fetchField()) > 0;
  if($exist) {
    db_update('nscem_variables')->fields(array('value' => json_encode($slides)))->execute();
  } else {
    db_insert('nscem_variables')->fields(array('key' => 'slide', 'value' => json_encode($slides)))->execute();
  }
  drupal_set_message('Save successfully!');
}

/**
 * Submit handler for the "add-one-more" button.
 *
 * Increments the max counter and causes a rebuild.
 */
function slides_add_more_add_one($form, &$form_state) {
  $form_state['num_slide_count']++;
  $form_state['rebuild'] = TRUE;
}
/**
 * Callback for both ajax-enabled buttons.
 *
 * Selects and returns the fieldset with the names in it.
 */
function slides_add_more_callback($form, $form_state) {
  return $form['slide-fieldset'];
}
