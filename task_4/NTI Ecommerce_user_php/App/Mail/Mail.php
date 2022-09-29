<?php
namespace App\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

abstract class Mail {
    protected const MAILHOST = 'smtp.mailtrap.io';
    protected const MAILUSERNAME = '60c14ec4010d80';
    protected const MAILPASSWORD = '6a7baf5c5673b1';
    protected const MAILPORT = 587;
    protected const MAILENCRYPTION = PHPMailer::ENCRYPTION_STARTTLS;
    protected PHPMailer $mail;
    public function __construct() {
        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = self::MAILHOST;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = self::MAILUSERNAME;                     //SMTP username
        $this->mail->Password   = self::MAILPASSWORD;                               //SMTP password
        $this->mail->SMTPSecure = self::MAILENCRYPTION;            //Enable implicit TLS encryption
        $this->mail->Port       = self::MAILPORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }

    public abstract function send($mailTo,$subject,$body) :bool;
}