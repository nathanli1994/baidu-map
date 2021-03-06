<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/1/12
 * Time: 22:51
 */

namespace phpmailer;

/*
 * 发送邮件类库
 */

use think\Exception;

class Email
{

    public static function send($to,$title,$content){

        date_default_timezone_set('PRC');//set time

        if(empty($to)){
            return false;
        }

        try{
            //Create a new PHPMailer instance
            $mail = new PHPMailer;
            //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            $mail->SMTPDebug = 2;
            //Ask for HTML-friendly debug output
            $mail->Debugoutput = 'html';
            //Set the hostname of the mail server
            $mail->Host = "mail.example.com";
            //Set the SMTP port number - likely to be 25, 465 or 587
            $mail->Port = 25;
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication
            $mail->Username = "yourname@example.com";
            //Password to use for SMTP authentication
            $mail->Password = "yourpassword";
            //Set who the message is to be sent from
            $mail->setFrom('from@example.com', 'First Last');
            //Set an alternative reply-to address
            //$mail->addReplyTo('replyto@example.com', 'First Last');
            //Set who the message is to be sent to
            $mail->addAddress($to);
            $mail->Subject = $title;
            $mail->msgHTML($content);
            //Replace the plain text body with one created manually
            //$mail->AltBody = 'This is a plain-text message body';
            //Attach an image file
            //$mail->addAttachment('images/phpmailer_mini.png');

            //send the message, check for errors
            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        }catch (phpmailerException $e){
            return false;
        }
    }
}