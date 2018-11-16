<?php


namespace Controller;

use services\ValidationForm;
use Symfony\Component\Validator\Validation;

class ContactFormController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();

        //Testing Recaptcha
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        $testRecaptcha = $this->getContainer()->newTestRecaptcha($this->getContainer(), $recaptchaResponse);
        $verifyRecaptcha = $testRecaptcha();

        //Testing form fields
        $validator = $this->getContainer()->newValidator();

        $validationForm = $this->getContainer()->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));

        $violations = array($violationName, $violationFirstName, $violationEmail, $violationMessage);

        //Get the error messages
        $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
        $error_msg = $violationMessages->violationMessages();

        $twig = $this->getTwig();

        //Sending Email
        if ($error_msg == "")
        {
            $sendEmail = $this->getContainer()->newSendMail($this->getContainer());
            $resultSendEmail = $sendEmail($request->request->get('nom'), $request->request->get('prenom'), $request->request->get('email'), $request->request->get('message'));

            if ($resultSendEmail == true)
            {
               header('Location: /accueil#contact');
                echo"<script>
                   $('.validation-form').fadeToggle('slow');
                   setTimeout(function()
                    {
                        $('.validation-form').fadeToggle('slow');
                    }, 5000);
                </script>";
            }
            else
            {
                $twig->addGlobal('error_msg', $error_msg);
                header('Location: /accueil#contact');
                //echo"<script>
                //   $('.error-form').fadeToggle('slow');
                //   setTimeout(function()
                //    {
                //        $('.error-form').fadeToggle('slow');
                //    }, 5000);
                //</script>";
            }
        }
        else
        {
            $twig->addGlobal('error_msg', $error_msg);
            header('Location: /accueil#contact');
            //echo"<script>
            //       $('.error-form').fadeToggle('slow');
            //       setTimeout(function()
            //        {
            //            $('.error-form').fadeToggle('slow');
            //        }, 5000);
            //    </script>";
        }


    }
}
