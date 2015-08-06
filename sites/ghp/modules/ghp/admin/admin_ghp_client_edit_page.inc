<?php

function admin_ghp_client_edit_page() {
  return drupal_get_form('admin_ghp_client_edit_form');
}

function admin_ghp_client_edit_form($form, &$form_state) {

  $client_id = intval(arg(3));
  $result = db_query("SELECT * FROM ghp_client WHERE id = :client_id",array(':client_id'=>$client_id));
  $item = $result->fetchObject();

  $form['id'] = array(
    '#type' => 'hidden',
    '#value' => $client_id,
    );

  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $item ? $item->name : '',
    '#description' => t("Name"),
    '#required' => TRUE
    );


  $form['image_fid_new'] = array(
    '#type' => 'managed_file',
    '#title' => t('Image'),
    '#size' => 40,
    '#default_value' => $item ? $item->image_fid : '',
    '#description' => t('Allowed extensions: gif png jpg jpeg'),
    '#upload_location' => 'public://',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg'),
        // Pass the maximum file size in bytes
      //'file_validate_size' => array(MAX_FILE_SIZE*1024*1024),
      ),

    );

  $form['image_fid'] = array(
    '#type' => 'hidden',
    '#value' => $item ? $item->image_fid : 0,
    );

  $form['weight'] = array(
    '#type' => 'textfield',
    '#title' => t('Weight'),
    '#size' => 2,
    '#maxlength' => 2,
    '#default_value' => $item ? $item->weight : '0',
    '#description' => t("Weight"),
    '#required' => FALSE
    );

  $form['status'] = array(
    '#type' => 'select',
    '#title' => t('Status'),
    '#default_value' => $item ? $item->status : 1,
    '#options' => array('1'=>'Publish','0'=>'Unpublish'),
    '#description' => t("Status of client"),
    '#required' => FALSE
    );

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Save'),
    );

  return $form;
}

function admin_ghp_client_edit_form_submit($form, &$form_state) {
  $values = $form_state['values'];

  $client_id = intval(arg(3));
  $name = $values['name'];
  $weight = intval($values['weight']);
  $status       = intval($values['status']);

  $image_fid_new   = $values['image_fid_new'];
    $image_fid       = $values['image_fid'];



    if (isset($image_fid_new) && $image_fid_new > 0) {
      if($image_fid_new != $image_fid) {
        if($image_fid > 0) {
          file_delete(file_load($image_fid));
        }

        $file = file_load($image_fid_new);
        $file->status = FILE_STATUS_PERMANENT;
        file_save($file);

        global $user;
          //Record that the module (in this example, user module) is using the file.
        file_usage_add($file, 'user', 'user', $user->uid);
      }
    } else {
      if($image_fid > 0) {
        file_delete(file_load($image_fid));
      }
    }

  $options = array(
    'name' => $name,
    'image_fid'=>$image_fid_new,
    'weight' => $weight,
    'status' => $status,
    );

  if($client_id > 0) {
    $num_updated = db_update('ghp_client')->fields($options)->condition('id',$client_id)->execute();
    drupal_set_message('Updated!');
  } else {
    $options['created'] = time();
    $num_updated = db_insert('ghp_client')->fields($options)->execute();
    drupal_set_message('Added!');
  }
  $queries = array();
  drupal_goto('admin/ghp/client/list',array('query'=>$queries));
}
