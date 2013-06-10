<?php

class UserController extends Controller
{
    public function actionSignUp($email, $key)
    {        
        $profile = Profile::model()->findByAttributes(
            array('email' => $email, 'secret_key' => $key));
        if ($profile != null) {
            $form = new SignUpForm;
            if (isset($_POST['SignUpForm'])) {
                $form->attributes = $_POST['SignUpForm'];
                $form->validate();
                if (!$form->hasError()) {
                    $user = new User;
                    $user->signUp($form->username, $form->password, $profile->id);
                    Yii::app()->user->setFlash('Congratulation. You have signed up successfully');
                    $this->redirect(Yii::app()->singInUrl);
                }
            }
        } else {
            $this->redirect(Yii::app()->homeUrl);
        }
    }
    
    public function forgetPassword()
    {
        if (isset($_POST['ForgetPasswordForm']['arg'])) {
            $profile = ProfileOrUserFinder::findProfile($_POST['ForgetPasswordForm']['arg']);
            if ($profile != null) {
                $profile->sendResetPasswordLink();
                Yii::app()->user->setFlash('We have sent you a link to reset your password. 
                    Please check your email');
                $this->redirect(Yii::app()->signInUrl);
            } else {
                Yii::app()->user->setFlash('Sorry ! No Username/Employee Code/Email found !');
            }
        }        
        $this->render('forget_password');        
    }
    
    public function resetPassword($email, $key)
    {        
        $profile = Profile::model()->findByAttributes(
            array('email' => $email, 'secret_key' => $key));
        if ($profile != null) {            
            if (isset($_POST['ResetPasswordForm'])) {
                $form = new SignUpForm;
                $form->attributes = $_POST['ResetPasswordForm'];
                $form->validate();
                if (!$form->hasError()) {
                    $user = $profile->user;
                    $user->password = md5($form->password);
                    $user->save();
                    $profile->updateKey();                    
                    $this->redirect(Yii::app()->signInUrl);
                }
            } else {
                $this->render('reset_password');
            }
        } else {
            $this->redirect(Yii::app()->homeUrl);
        }
    }
}
?>
