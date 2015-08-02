<?php

function admin_nscem_page() {
  $title = 'NSCEM Management';
  $type = 'ul';
  $items[] = array(
    'data' => l('Website Configuration', 'admin/nscem/config')
  );
  $items[] = array(
    'data' => l('Cook Detail Management', 'admin/nscem/cook')
  );
  $items[] = array(
    'data' => l('Relax Detail Management', 'admin/nscem/relax')
  );
  return theme_item_list(array('items' => $items, 'title' => $title, 'type' => $type, 'attributes' => array()));
}
