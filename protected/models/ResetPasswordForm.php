<?php

class ResetPasswordForm extends CFormModel
{
    public $password;
    public $passwordConfirm;
    
    public function rules()
    {
        return array(
            array('password', 'compare',
                'compareAttribute' => 'passwordConfirm',
                'message' => "Retype password is incorrect.")
        );
    }
}
?>
