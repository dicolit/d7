<?php

function admin_ghp_service_edit_page() {
  return drupal_get_form('admin_ghp_service_edit_form');
}

function admin_ghp_service_edit_form($form, &$form_state) {

  $badge_id = intval(arg(3));
  $result = db_query("SELECT * FROM milo_champion_badge WHERE id = :badge_id",array(':badge_id'=>$badge_id));
  $item = $result->fetchObject();

  $form['id'] = array(
    '#type' => 'hidden',
    '#value' => $badge_id,
    );

  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $item ? $item->name : '',
    '#description' => t("State name (max 25 chars)."),
    '#required' => TRUE
    );


  $form['icon_fid_new'] = array(
    '#type' => 'managed_file',
    '#title' => t('Icon (100x100)'),
    '#size' => 40,
    '#default_value' => $item ? $item->icon_fid : '',
    '#description' => t('Allowed extensions: gif png jpg jpeg'),
    '#upload_location' => 'public://',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
        // Pass the maximum file size in bytes
      'file_validate_size' => array(MAX_FILE_SIZE*1024*1024),
      ),

    );

  $form['icon_fid'] = array(
    '#type' => 'hidden',
    '#value' => $item ? $item->icon_fid : 0,
    );


  $form['description'] = array(
    '#type' => 'textarea',
    '#title' => t('Description'),
    '#size' => 250,
    '#maxlength' => 250,
    '#default_value' => $item ? $item->description : '',
    '#description' => t("Description"),
    '#required' => FALSE
    );

  $form['icon'] = array(
    '#type' => 'textfield',
    '#title' => t('Icon'),
    '#size' => 100,
    '#maxlength' => 100,
    '#default_value' => $item ? $item->icon : '',
    '#description' => t("Icon"),
    '#required' => FALSE
    );

  $form['status'] = array(
    '#type' => 'select',
    '#title' => t('Status'),
    '#default_value' => $item ? $item->status : 1,
    '#options' => array('1'=>'Publish','0'=>'Unpublish'),
    '#description' => t("Status of state"),
    '#required' => FALSE
    );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
    );

  return $form;
}

function admin_ghp_service_edit_form_submit($form, &$form_state) {
  $values = $form_state['values'];

  $badge_id = intval(arg(3));

  $name        = $values['name'];
  $description         = $values['description'];
  $icon      = $values['icon'];
  $status       = intval($values['status']);

  $icon_fid_new   = $values['icon_fid_new'];
    $icon_fid       = $values['icon_fid'];



    if (isset($icon_fid_new) && $icon_fid_new > 0) {
      if($icon_fid_new != $icon_fid) {
        if($icon_fid > 0) {
          file_delete(file_load($icon_fid));
        }

        $file = file_load($icon_fid_new);
        $file->status = FILE_STATUS_PERMANENT;
        file_save($file);

        global $user;
          //Record that the module (in this example, user module) is using the file.
        file_usage_add($file, 'user', 'user', $user->uid);
      }
    } else {
      if($icon_fid > 0) {
        file_delete(file_load($icon_fid));
      }
    }

  $options = array(
    'name' => $name,
    'icon_fid'=>$icon_fid_new,
    'description' => $description,
    'icon' => $icon,
    'status' => $status,
    );

  if($badge_id > 0) {
    $num_updated = db_update('milo_champion_badge')->fields($options)->condition('id',$badge_id)->execute();
    drupal_set_message('Updated!');
  } else {
    $options['created_date'] = time();
    $num_updated = db_insert('milo_champion_badge')->fields($options)->execute();
    drupal_set_message('Added!');
  }
  $queries = array();
  drupal_goto('admin/mobile_app/badge/list',array('query'=>$queries));
}
