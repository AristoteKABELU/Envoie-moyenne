<?php 

namespace App;

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



class PHPMaillerStudent
{
    private $mail;
    private $host;
    private $username;
    private $password;

    public function __construct(string $host, string $username, string $password)
    {
        $this->mail = new PHPMailer(true);
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
    }

    public function settingSMTP()
    {
        $this->mail->SMTPDebug = SMTP::DEBUG_OFF;
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $this->host;                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $this->username;                     //SMTP username
        $this->mail->Password   = $this->password;                               //SMTP password
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $this->mail->Port       = 465; 

    }

    public function addMail(string $mail)
    {
        $this->mail->addAddress($mail);
    }

    public function sendMail()
    {
        try{
            $this->mail->send();
            echo 'Success';
        } catch(Exception $e) {
            echo "Erreur d'envoie: {$this->mail->ErrorInfo}";
        }
        
    }

    public function Setcontent(string $subject, string $message, $html = true)
    {
        if ($html) {
            $this->mail->isHTML(true);
        }

        $this->mail->Subject = $subject;
        $this->mail->Body = $message;
    }

}