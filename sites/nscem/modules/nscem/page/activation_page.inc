<?php
function activation_page() {
  /*drupal_add_js(base_path().path_to_theme().'/js/brand_detail_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/brand_detail_page.css');*/
    $active_status = activate_account();
    if($active_status){
        form_set_error('active_message' , t('Your account is activated.'));
    } else {
        form_set_error('active_message' , t('Can not activate your account.'));
    }
  drupal_goto('/sign-in');return;
}

/**
 * Active account : change status to 1
 */
function activate_account(){
    if(isset($_GET['token']) && $_GET['token']){
        $token = $_GET['token'];
        $query_string = Database::getConnection()->prefixTables("UPDATE {users} SET status = 1 WHERE md5(mail) = :token");
        db_query($query_string,array(':token' => $token));
        return true;
    }
    return false;
}

/**
 * Check name or email exists.
 *
 * @param $name
 * @param $email
 * @return bool
 */
function validate_user($name, $email){
    $query=db_select('users','u')->fields('u',array('uid'));

    $db_or = db_or();
    $db_or->condition('u.name', $name , '=');
    $db_or->condition('u.mail', $email , '=');
    $query->condition($db_or);
    try{
        $result = $query->execute()->fetchAll();
    } catch (Exception $e){
        form_set_error('sign_in_form',$e->getMessage());
    }
    return count($result) == 0;
}

function brand_detail_form($form, &$form_state) {

  $email = '';
  $form['name'] = array(
    '#type' => 'textfield',
    '#title' => t('Your Email'),
    '#size' => 30,
    '#maxlength' => 25,
    '#default_value' => $email,
    '#description' => NULL,
    '#required' => FALSE
    );

  $form['send'] = array(
    '#type' => 'submit',
    '#value' => t('Send'),
    '#attributes' => array('class'=>array('yellow-btn','send-btn')),
    );
  return $form;
}

function brand_detail_form_validate($form, &$form_state) {

}

function brand_detail_form_submit($form, &$form_state) {
  form_set_error('email', 'abc');
}
