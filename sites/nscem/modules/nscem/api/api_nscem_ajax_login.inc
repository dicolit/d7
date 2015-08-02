<?php
function _ajax_login($data, $access_token){
    $errors = _is_valid_login_data($data, $access_token);
    if(count($errors->msg) > 0){
        return __get_json_response_data(0, implode(',',$errors->msg), $errors->fields, array());
    }

    $email = $data->mail;
    $user_tmp = user_load_by_mail(array('mail'=> $email));
    if($user_tmp){
        $uid = user_authenticate($user_tmp->name, $data->pass);
        if($uid){
            global $user;
            $user = $user_tmp;

            //Handle session
            $edit = array(
                'name' => $user->name,
            );
            user_login_finalize($edit);
        } else {
            $errors->msg[] = t('Invalid email or password');
            $errors->fields = array('mail','pass');
        }
    } else {
        $errors->msg[] = t('Invalid email or password');
        $errors->fields = array('mail','pass');
    }
    if(count($errors->msg) > 0){
        return __get_json_response_data(0,implode(',',$errors->msg),$errors->fields,array());
    }
    return __get_json_response_data(1,'Login successful',$errors->fields,array());
}

function _is_valid_login_data($data, $access_token){
    $msg = array();
    $fields = array();
    if(user_is_logged_in()){
        return (object)array('msg' => array('User is logged in'),'fields' => $fields);
    }
    $email = $data->mail;
    if(!$email == '' || (!valid_email_address($email)) || !$data->pass){
      $msg[] = 'Invalid email or password.';
      $fields[] = 'mail';
    }
    return (object)array('msg' => $msg,'fields' => $fields);
}