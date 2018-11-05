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
            try {
                //Server settings                               // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = $this->getContainer()->getParam('PHPMailer/host');  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = $this->getContainer()->getParam('PHPMailer/username');       // SMTP username
                $mail->Password = $this->getContainer()->getParam('PHPMailer/password');                           // SMTP password
                $mail->SMTPSecure = $this->getContainer()->getParam('PHPMailer/SMTPSecure');                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = $this->getContainer()->getParam('PHPMailer/port');                                   // TCP port to connect to

                //Recipients
                $mail->setFrom($email, $name.' '.$first_name);
                $mail->addAddress($this->getContainer()->getParam('PHPMailer/username'), $this->getContainer()->getParam('PHPMailer/name'));

                //Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $this->getContainer()->getParam('PHPMailer/Subject');
                $mail->Body    = $message;

                $mail->send();
                echo 'Le message a été envoyé';
            } catch (Exception $e) {
                echo "Le message n'a pas été envoyé. Erreur: ", $mail->ErrorInfo;
            }
        }


        //Response
        /* $view = $this->getTwig()->render('blog/home.html.twig');
        $response = $this->getContainer()->newHttpResponseHtml($view)
        $response->send(); */
    }
}