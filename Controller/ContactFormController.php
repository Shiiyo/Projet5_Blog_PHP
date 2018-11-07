<?php


namespace Controller;

use PHPMailer\PHPMailer\Exception;

class ContactFormController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        //Request
        $request = $this->getContainer()->newHttpRequest();

        $name = $request->request->get('nom');
        $first_name = $request->request->get('prenom');
        $email = $request->request->get('email');
        $message = $request->request->get('message');
        $recaptchaResponse = $request->request->get('g-recaptcha-response');

        $requestRecaptcha = $this->getContainer()->createHttpRequest(
            "https://www.google.com/recaptcha/api/siteverify",
            'POST',
            array(
                'secret' => '6LeJCnQUAAAAABCqgPutdMDbdQAzDp4iF-DKre8X',
                'response' => $recaptchaResponse));

        $recaptachaResult = $requestRecaptcha->overrideGlobals();

        if ($recaptachaResult == NULL && isset($name) && isset($first_name) && isset($email) && isset($message))
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
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        }


        //Response
        /* $view = $this->getTwig()->render('blog/home.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view)
        $response->send(); */
    }
}