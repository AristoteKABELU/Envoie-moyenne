<?php 

namespace App;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class PHPMaillerStudent extends PHPMailer
{
    private $mail;
    private $host;
    private $username;
    private $password;

    public function __construct(string $host, string $username, string $password)
    {
        $this->exceptions = true;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function settingSMTP()
    {
        $this->SMTPDebug = SMTP::DEBUG_OFF;
        $this->isSMTP();                                            //Send using SMTP
        $this->Host       = $this->host;                     //Set the SMTP server to send through
        $this->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->Username   = $this->username;                     //SMTP username
        $this->Password   = $this->password;                               //SMTP password
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->Port       = 465; 

        return $this;
    }


    public function getReply()
    {
        var_dump($this->ReplyTo);
    }

    /* public function addAddress(string $mail)
    {
        $this->mail->addAddress($mail);
        
        return $this;
    } 

    public function removeAddress()
    {
        $this->mail->clearReplyTos();
    }

    public function sendMail()
    {
        $this->mail->send();
    }

    public function getError()
    {
        return $this->mail->ErrorInfo;
    }
    */

    public function Setcontent(string $subject, string $message, $html = true)
    {
        if ($html) {
            $this->isHTML(true);
        }

        $this->Subject = $subject;
        $this->Body = $message;

        return $this;
    }

}