<?php

function admin_ghp_client_page() {
  $destination = drupal_get_destination();
  $output = '';
  $output .= '<div style="text-align:right">'.l('Add new client','admin/ghp/client/0/edit',array('query'=>$destination)).'</div>';
  $admin_ghp_client_form = drupal_get_form('admin_ghp_client_form');
  $output .= drupal_render($admin_ghp_client_form);
  return $output;
}

function admin_ghp_client_form($form, &$form_state) {


  $form['filter'] = array(
    '#type' => 'fieldset',
    '#title' => '',
    '#weight' => -50,
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
    );


  $form['filter']['export'] = array(
    '#type' => 'submit',
    '#value' => t('Export'),
    '#submit' => array('admin_ghp_client_form_export'),
    );

  // Build the sortable table header.
  $header = array(
    'id' => t('ID'),
    'image'=>'Image',
    'title' => array('data' => t('Name'), 'field' => 'name'),
    'status'=> array('data' => t('Status'), 'field' => 'status',  'sort' => 'ASC'),
    'created'=> t('Created Date'),
    );

  $header['operations'] = array('data' => t('Operations'));
  $query = db_select('ghp_client', 'gc')->extend('PagerDefault')->extend('TableSort');

  $arrData = $query
  ->fields('gc')
  ->limit(10)
  //->condition('gc.type','client_detail')
  ->orderByHeader($header)
  ->orderBy('gc.id', 'ASC')
  ->execute()
  ->fetchAll();

  $options = array();
  foreach ($arrData as $value) {

    $photo_image = '<img src="'.__get_image_path_from_fid($value->image_fid).'" >';

    $options[$value->id] = array(
      'id' => $value->id,
      'image'=>$photo_image,
      'name' => $value->name,
      'status' => $value->status,
      'created'=>date('c',$value->created),
      );

      // Build a list of all the accessible operations for the current record.
    $operations = array();
    $operations['edit'] = array(
      'title' => t('Edit'),
      'href' => 'admin/ghp/client/' . $value->id . '/edit',
      );

    $options[$value->id]['operations'] = array(
      'data' => array(
        '#theme' => 'links__node_operations',
        '#links' => $operations,
        '#attributes' => array('class' => array('links', 'inline')),
        ),
      );
  }

  // Only use a tableselect when the current user is able to perform any
  // operations.
  $form['list'] = array(
    '#theme' => 'table',
    '#header' => $header,
    '#rows' => $options,
    '#empty' => t('No content available.'),
    '#weight'=> -40,
    );

  $form['pager'] = array(
    '#weight'=> 0,
    '#markup' => theme('pager'));
  return $form;
}


function admin_ghp_client_form_export($form, &$form_state) {
  $query = db_select('node', 'n');

  $arrData = $query
  ->fields('n',array(
    'nid'
    ,'title'
    ,'created'
    ,'status'
    )
  )
  ->orderBy('n.nid', 'ASC')
  ->execute()
  ->fetchAll();

  // Create excel file
  $header = array();
  $header[] = 'Node ID';
  $header[] = 'Title';
  $header[] = 'Created Date';
  $header[] = 'Status';

  $data['headers'] = $header;

  $rows = array();
  foreach($arrData as $key=>$value) {
    $tmp = array();
    $tmp[] = $value->nid;
    $tmp[] = $value->title;
    $tmp[] = date('Y-m-d H:i:s',$value->created_date);
    $tmp[] = $value->status;

    $rows[] = $tmp;
  }
  $data['rows'] = $rows;

  __export_to_excel($data,$name);

}

