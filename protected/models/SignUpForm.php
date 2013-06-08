<?php

class SignUpForm extends User 
{
    public $verifyPassword;    

    public function rules() {
        $rules = parent::rules();               
        $rules[] = array('verifyPassword', 'required');
        $rules[] = array('password', 'compare',
            'compareAttribute' => 'verifyPassword',
            'message' => "Retype password is incorrect.");        
        return $rules;
    }
}