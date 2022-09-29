<?php 
namespace App\Mail;
use PHPMailer\PHPMailer\Exception;

class ForgetPasswordCodeMail extends Mail {
    public function send($mailTo,$subject,$body) :bool
    {
        try {
            $this->mail->setFrom('ecommerce@gmail.com', 'Forget Password Mail');
            $this->mail->addAddress($mailTo);
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $subject;
            $this->mail->Body    = $body;
            $this->mail->send();
            // echo 'Message has been sent';
            return true;
        }catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
            return false;

        }
    }
}