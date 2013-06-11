<?php

class SignUpForm extends User 
{
    public $passwordConfirm;    

    public function rules() {
        $rules = parent::rules();               
        $rules[] = array('passwordConfirm', 'required');
        $rules[] = array('password', 'compare',
            'compareAttribute' => 'verifyPassword',
            'message' => 'Retype password is incorrect.');        
        return $rules;
    }
}