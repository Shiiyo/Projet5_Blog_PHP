<?php

namespace services;

use PHPMailer\PHPMailer\Exception;
use services\Interfaces\SendEmailInterface;

class SendEmail implements SendEmailInterface
{
    protected $container;

    public function __construct($container)
    {
        $this->setContainer($container);
    }

    public function __invoke($name, $first_name, $email, $message)
    {
        $mail = $this->getContainer()->newPHPMailer();
        $mail->SMTPDebug = false;
        $mail->isSMTP();
        $mail->Host = $this->getContainer()->getParam('PHPMailer/host');
        $mail->SMTPAuth = true;
        $mail->Username = $this->getContainer()->getParam('PHPMailer/username');
        $mail->Password = $this->getContainer()->getParam('PHPMailer/password');
        // $mail->SMTPSecure = $this->getContainer()->getParam('PHPMailer/SMTPSecure');
        $mail->Port = $this->getContainer()->getParam('PHPMailer/port');

        //Recipients
        $mail->setFrom($email, utf8_decode($name).' '.utf8_decode($first_name));
        $mail->addAddress($this->getContainer()->getParam('PHPMailer/username'), $this->getContainer()->getParam('PHPMailer/name'));

        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            )
        );
        //Content
        $mail->isHTML(true);
        $mail->Subject = utf8_decode($this->getContainer()->getParam('PHPMailer/Subject'));
        $mail->Body   = utf8_decode('<p><strong>Email:</strong> ' . $email . '<br>'.
            '<strong>Nom:</strong> '. $name .' '.$first_name. '</p>'.
            '<p><strong>Message: </strong><br>'. nl2br(htmlentities($message)).'</p>');

        if (!$mail->send()) {
            return "Mailer Error: " . $mail->ErrorInfo;
        }
        return true;
    }

    /**
     * @return \framework\DependencyInjectionContainer
     */
    public function getContainer() :\framework\DependencyInjectionContainer
    {
        return $this->container;
    }

    /**
     * @param \framework\DependencyInjectionContainer $container
     */
    public function setContainer($container): void
    {
        $this->container = $container;
    }
}
