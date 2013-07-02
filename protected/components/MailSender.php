<?php
class MailSender
{
    public static function sendMail($receiver, $subject, $content, $name)
    {
        $name = 'Mr./Ms. '.$name;
        $message = new YiiMailMessage;
        $message->view = 'email_template';
        $message->setSubject($subject);
        $message->setTo($receiver);
        $message->setFrom(Yii::app()->params['adminEmail']);
        $message->setBody(array('content' => $content, 'name' => $name, 'subject' => $subject), 'text/html');
        $result = Yii::app()->mail->send($message);
        return $result;
    }
}
?>