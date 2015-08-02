<?php
function _ajax_register($data, $access_token){
    $errors = _is_valid_register_data($data, $access_token);
    if(count($errors->msg) > 0){
        return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, $data);
    }
    $name = $data->name;
    $email = $data->mail;

    $edit = array(
        'name' => $name,
        'pass' => user_password(),
        'mail' => $email,
        'init' => $email,
        'status' => 0,
        'access' => REQUEST_TIME,
    );
    try{
        $new_account = user_save(drupal_anonymous_user(), $edit);
        if($new_account){
            //Handle session
            /*$edit = array(
                'name' => $name,
            );
            user_login_finalize($edit);*/
            /* Send activation email */
            $params = array(
                'account' => $new_account,
                '@active_url' => $GLOBALS['base_root'].'/activation?token='.md5($edit['mail'])
            );
            $language = user_preferred_language($new_account);
            $mail = drupal_mail('nscem_register', 'register_no_approval_required', $new_account->mail, $language, $params);
            //_user_mail_notify('register_no_approval_required',$new_account);
            //$mail = drupal_mail('user_registrationpassword', 'register', $new_account->mail, user_preferred_language($new_account), $params);
            //drupal_mail('nscem_register','email_register',$email,language_default(),array('@email' => $email,'@pass' => $edit['pass'],'@url' => $GLOBALS['base_root'].'/activation?token='.md5($edit['mail'])));
        } else {
            $errors->msg = 'Cannot add new user. Please try again.';
        }
    } catch (Exception $e){
        $errors->msg[] = $e->getMessage();
    }

    if(count($errors->msg) > 0){
        return __get_json_response_data(0,'Cannot add new user. Please try again.',$errors->fields,$data);
    }
    return __get_json_response_data(1,'Login success',$errors->fields,$data);
}

function _is_valid_register_data($data, $access_token){
    $msg = array();
    $fields = array();
    if(user_is_logged_in()){
        return (object)array('msg' => array('User is logged in'),'fields' => array());
    }
    $email = $data->mail;
    if(trim($email) == ''){
      $msg[] = 'Email is required.';
      $fields[] = 'mail';
    } elseif(!valid_email_address($email)) {
      $msg[] = 'Please enter invalid email.';
      $fields[] = 'mail';
    }

    if(trim($data->name) == ''){
      $msg[] = 'The name is required.';
      $fields[] = 'name';
    }

    if(count($msg) == 0 && !validate_user($data->name, $email)){
      $msg[] = 'The name or email are exists.';
    }
    return (object)array('msg' => $msg,'fields' => $fields);
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
        return false;
        //form_set_error('sign_in_form',$e->getMessage());
    }
    return count($result) == 0;
}

/**
 * Implements hook_mail().
 */
function nscem_register_mail($key, &$message, $params) {
    /*$message['subject'] = t("@Activation email", $params);
    $message['body'] = array();
    $message['body'][] = t("Hello", $params);
    $message['body'][] = t('Email : @email<br/>Password : @pass', $params);
    $message['body'][] = t('Click <a href="@url">here</a> to active your account.', $params);*/
    //print_r($params);exit;
    $language = $message['language'];
    $variables = array('user' => $params['account']);
    $message['subject'] .= _user_mail_text($key . '_subject', $language, $variables);
    $message['body'][] = str_replace('@active_url',$params['@active_url'],_user_mail_text($key . '_body', $language, $variables));
}