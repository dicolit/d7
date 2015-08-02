<?php

function admin_nscem_relax_page($form, &$form_state) {
  $header = array(
    'name' => 'Name'
    , 'created' => 'Created'
    , 'updated' => 'Updated'
    , 'actions' => 'Operations'
  );

  $options = array();
  $query = db_select('node', 'n')->extend('PagerDefault');
  $query->fields('n', array('nid', 'title', 'created', 'changed'));
  $query->condition('type', 'relax_detail');
  $query->innerJoin('nscem_relax_detail', 'd', "d.nid=n.nid");
  $query->condition('d.deleted', 1, '!=');
  $query->limit(20);
  $nodes = $query->execute()->fetchAll();
  foreach ($nodes as $node) {
    $options[] = array(
      'name' => l($node->title, "node/{$node->nid}", array('attributes' => array('target' => '_blank')))
      , 'created' => date('Y-m-d H:i', $node->created)
      , 'updated' => date('Y-m-d H:i', $node->changed)
      , 'actions' => '<ul class="links inline">
                        <li class="edit first">' . l('edit', "node/{$node->nid}/edit", array('query' => array('destination' => 'admin/nscem/relax'))) . '</li>
                        <li class="delete last">' . l('delete', "node/{$node->nid}/delete", array('query' => array('destination' => 'admin/nscem/relax'))) . '</li>
                      </ul>'
    );
  }
  $form['add_new'] = array(
    '#markup' => '<ul class="action-links"><li>' . l('Add new relax', 'node/add/relax-detail', array('query' => array('destination' => 'admin/nscem/relax'))) . '</li></ul>'
  );
  $form['table'] = array (
    '#markup' => theme('table', array(
      'header' => $header
      , 'rows' => $options
    ))
  );
  $form['pager'] = array (
    '#markup' => theme('pager')
  );
  return $form;
}
