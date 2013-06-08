<?php

class UserController extends Controller
{
    public function actionSignUp($email, $key)
    {        
        $profile = Profile::model()->findByAttributes(
            array('email' => $email, 'secret_key' => $key));
        if($profile != null){
            $form = new SignUpForm;
            if (isset($_POST['SignUpForm'])){
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
}
?>
