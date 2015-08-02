<?php
function confirm_email_page()
{
  /* Load email from token */
  $query_string = Database::getConnection()->prefixTables("SELECT u.mail, u.uid FROM {users} AS u WHERE md5(u.mail) = :mail");
  $result = db_query($query_string,array(':mail' => arg(1)))->fetchField();
  $form = drupal_get_form('confirm_email_form');
  $data = array(
    'confirm_email_form' => drupal_render($form),
    'token' => arg(1),
    'email' =>  ($result) ? $result : false
  );
  $output = theme('confirm_email_page', array('data' => $data));
  return $output;
}

function confirm_email_form($form, &$form_state)
{
  $form['token'] = array(
    '#type' => 'hidden',
    '#default_value' => htmlspecialchars(arg(1)),
  );

  return $form;
}

function confirm_email_form_validate($form, &$form_state)
{/*echo 'aaaaaaa';exit;
  $token = $form_state['values']['token'];
  if (trim($token) == '') {
    form_set_error('confirm_email_form', t('Invalid token.'));
  }*/
}

function confirm_email_form_submit($form, &$form_state)
{
  $query_string = Database::getConnection()->prefixTables("SELECT u.mail, u.uid FROM {users} AS u WHERE md5(u.mail) = :mail");
  $result = db_query($query_string,array(':mail' => $form_state['values']['token']))->fetchCol();
  if(!count($result)){
    form_set_error('confirm_email_form','Invalid user');
  } else {
    $account = user_load($result['uid']);
    if($account->status == 1){
      form_set_error('confirm_email_form','Your account is activated.');
    } else {
      $params = array(
        'account' => $account,
        '@active_url' => $GLOBALS['base_root'] . '/activation?token=' . md5($account->mail),
        '@pass' =>  'No change'
      );
      $language = user_preferred_language($account);
      $mail = drupal_mail('nscem_register', 'register_no_approval_required', $account->mail, $language, $params);
    }
  }

}