<?php
function forgot_password_page() {
  drupal_add_js(base_path().path_to_theme().'/js/forgot_password_page.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_css(base_path().path_to_theme().'/css/forgot_password_page.css');
  $data = array();
  $forgot_password_form = drupal_get_form('forgot_password_form');
  $data['forgot_password_form'] = drupal_render($forgot_password_form);
  $output = theme('forgot_password_page',array('data'=>$data));
  return $output;
}

/**
 * Form builder; Request a password reset.
 *
 * @ingroup forms
 * @see forgot_password_form_validate()
 * @see forgot_password_form_submit()
 */
function forgot_password_form() {
    global $user;

    $form['name'] = array(
        '#type' => 'textfield',
        '#title' => t('Username or e-mail address'),
        '#size' => 60,
        '#maxlength' => max(USERNAME_MAX_LENGTH, EMAIL_MAX_LENGTH),
        '#required' => TRUE,
        '#default_value' => isset($_GET['name']) ? $_GET['name'] : '',
        '#no_wrapper' => true,
    );

    $form['actions'] = array('#type' => 'actions');
    $form['actions']['submit'] = array('#type' => 'submit', '#value' => t('Submit'));

    return $form;
}

function forgot_password_form_validate($form, &$form_state) {
    $name = trim($form_state['values']['name']);
    // Try to load by email.
    $users = user_load_multiple(array(), array('mail' => $name, 'status' => '1'));
    $account = reset($users);
    if (!$account) {
        // No success, try to load by name.
        $users = user_load_multiple(array(), array('name' => $name, 'status' => '1'));
        $account = reset($users);
    }
    if (isset($account->uid)) {
        form_set_value(array('#parents' => array('account')), $account, $form_state);
    }
    else {
        form_set_error('name', t('Sorry, %name is not recognized as a user name or an e-mail address.', array('%name' => $name)));
    }
}

function forgot_password_form_submit($form, &$form_state) {
    global $language;

    $account = $form_state['values']['account'];
    // Mail one time login URL and instructions using current language.
    $mail = _user_mail_notify('password_reset', $account, $language);
    if (!empty($mail)) {
        watchdog('user', 'Password reset instructions mailed to %name at %email.', array('%name' => $account->name, '%email' => $account->mail));
        drupal_set_message(t('Further instructions have been sent to your e-mail address.'));
    }

    $form_state['redirect'] = 'user';
    return;
}
