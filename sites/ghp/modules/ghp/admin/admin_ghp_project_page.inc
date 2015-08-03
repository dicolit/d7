<?php

function admin_ghp_project_page() {
  $destination = drupal_get_destination();
  $output = '';
  $output .= '<div style="text-align:right">'.l('Add new project','node/add/project-detail',array('query'=>$destination)).'</div>';
  $admin_ghp_project_form = drupal_get_form('admin_ghp_project_form');
  $output .= drupal_render($admin_ghp_project_form);
  return $output;
}

function admin_ghp_project_form($form, &$form_state) {


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
    '#submit' => array('admin_ghp_project_form_export'),
    );

  // Build the sortable table header.
  $header = array(
    'id' => t('ID'),
    'title' => array('data' => t('Title'), 'field' => 'title'),
    'status'=> array('data' => t('Status'), 'field' => 'status',  'sort' => 'ASC'),
    'created_date'=> t('Created Date'),
    );

  $header['operations'] = array('data' => t('Operations'));
  $query = db_select('node', 'n')->extend('PagerDefault')->extend('TableSort');

  $arrData = $query
  ->fields('n')
  ->limit(10)
  ->condition('n.type','project_detail')
  ->orderByHeader($header)
  ->orderBy('n.nid', 'ASC')
  ->execute()
  ->fetchAll();

  $options = array();
  foreach ($arrData as $value) {

    $photo_image = '';//'<img src="'.__get_image_path_from_fid($value->photo_fid).'" >';

    $options[$value->nid] = array(
      'id' => $value->nid,
      'title' => $value->title,
      'status' => $value->status,
      'created'=>date('c',$value->created),
      );

      // Build a list of all the accessible operations for the current record.
    $operations = array();
    /*$operations['edit'] = array(
      'title' => t('Edit'),
      'href' => 'admin/ponds_atlantic/photo/' . $value->id . '/edit',
      );
    */
    $options[$value->nid]['operations'] = array(
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


function admin_ghp_project_form_export($form, &$form_state) {
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
  ->condition('n.type','project_detail')
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

