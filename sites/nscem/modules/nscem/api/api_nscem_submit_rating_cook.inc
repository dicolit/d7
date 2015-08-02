<?php
function _submit_rating_cook($data, $access_token){
    $errors = _is_valid_rating_data_cook($data, $access_token);
    if(count($errors) > 0){
        return __get_json_response_data(0, NULL, $errors, $data);
    }
    /* if review is approved immediately */
    return __get_json_response_data(1,t('Success'),$errors,(object)array('avg' => 3.5,'sum' => 10));

    /* if review is pending and waiting for approve */
    //return __get_json_response_data(1,t('Your review is pending and waiting for approve'),$errors,$data);
}

function _is_valid_rating_data_cook($data, $access_token){
    $errors = array();
    /* TODO Check logged in user and user reviewed current cook */
    if(!$data->num_star || ($data->num_star && $data->num_star > 5)){
        $errors[] = t('Invalid number of star');
    }
    if(!$data->node_id){
        $errors[] = t('Invalid cook id');
    }
    return $errors;
}