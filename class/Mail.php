<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class Mail
{
    private $smtp_host;
    private $smtp_email;
    private $smtp_password;
    private $from_email;
    private $from_name;
    private $admin1_email;
    private $admin2_email;
    private $mail;
    private $env;

    public function __construct()
    {
        $this->env = parse_ini_file('.env');
        $this->smtp_host = $this->env["SMTP_HOST"];
        $this->smtp_email = $this->env["SMTP_EMAIL"];
        $this->smtp_password = $this->env["SMTP_PASSWORD"];
        $this->from_email = $this->env["FROM_EMAIL"];
        $this->from_name = $this->env["FROM_NAME"];
        $this->admin1_email = $this->env["ADMIN1_EMAIL"];
        $this->admin2_email = $this->env["ADMIN2_EMAIL"];
        
        $this->mail = new PHPMailer(true);

        //Server settings
        $this->mail->isSMTP();
        $this->mail->Host       = $this->smtp_host;
        $this->mail->SMTPAuth   = true;
        $this->mail->Username   = $this->smtp_email;
        $this->mail->Password   = $this->smtp_password;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }

    public function sendEmail($email, $name, $message)
    {
        // echo $email, " ", $name, " ",$message["subject"]," ",$message["msg"];

        try {
            // Send message to admins
            $this->mail->setFrom($this->from_email, $this->from_name);
            $this->mail->addAddress($this->admin1_email);
            $this->mail->addBCC($this->admin2_email);

            $this->mail->isHTML(true);
            $this->mail->Subject = $message["subject"];
            $this->mail->Body    = '<b>MESSAGE:</b> <br />' . $message["msg"];

            $this->mail->send();
            echo 'Admin Message has been sent';

            $this->mail->ClearAllRecipients();

            // Send message to requester
            $this->mail->setFrom($this->from_email, $this->from_name);
            $this->mail->addAddress($email, $name);

            $this->mail->isHTML(true);
            $this->mail->Subject = $message["subject"];
            $this->mail->Body = "<b>MESSAGE:</b> <br />Your ticket has been created and it will be worked on by the relevant department.";

            $this->mail->send();
            echo 'Requester Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    function sendTicketStatusEmail($email, $name, $message)
    {
        try {
            // Send message to admins
            $this->mail->setFrom($this->from_email, $this->from_name);
            $this->mail->addAddress($email, $name);
            $this->mail->addAddress($this->admin1_email);
            $this->mail->addBCC($this->admin2_email);

            $this->mail->isHTML(true);
            $this->mail->Subject = $message["subject"];
            $this->mail->Body    = '<b>MESSAGE:</b> <br />' . $message["msg"];

            $this->mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
}
