<?php

namespace Drupal\simple_form\Form;

use \Drupal\Core\Form\FormBase;
use \Drupal\Core\Form\FormStateInterface;

class BasicForm extends FormBase {

    public function getFormId() {

        return 'simple_form_basic_form';
    }


    public function buildForm(array $form, FormStateInterface $form_state) {

        $form['name'] = array(
            '#type'     => 'textfield',
            '#title'    => $this->t('Your Name'),
            '#required' => TRUE,
            '#weight'   => 10,
        );

        $form['mail'] = array(
            '#type'     => 'textfield',
            '#title'    => $this->t('Your Email'),
            '#required' => TRUE,
            '#weight'   => 20,
        );

        $form['submit'] = array(
            '#type'     => 'submit',
            '#value'    => $this->t('Submit'),
            '#weight'   => 999,
        );

        return $form;
    }


    public function validateForm(array &$form, FormStateInterface $form_state) {

        $mail = $form_state->getValue('mail');

        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $form_state->setErrorByName('mail', $this->t('The email address you entered is invalid.'));
        }
    }


    public function submitForm(array &$form, FormStateInterface $form_state) {

        $name = $form_state->getValue('name');
        $mail = $form_state->getValue('mail');

        drupal_set_message($this->t('Hello @name, your email address is @mail', array(
            '@name'     => $name,
            '@mail'     => $mail,
        )));
    }
}

