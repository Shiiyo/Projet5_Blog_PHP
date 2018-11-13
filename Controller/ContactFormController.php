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

        $recaptchaResponse = $request->request->get('g-recaptcha-response');

        $validator = $this->getContainer()->newValidator();

        $validationForm = $this->getContainer()->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));

        $violations = array($violationName, $violationFirstName, $violationEmail, $violationMessage);
        foreach ($violations as $violation)
        {
            if(0 !== count($violation))
            {
                foreach ($violation as $v){
                    echo $v->getMessage().'<br>';
                }
            }
        }


       // $testRecaptcha = $this->getContainer()->newTestRecaptcha($this->getContainer(), $recaptchaResponse);
       // $requestRecaptcha = $testRecaptcha();
//
       // $recaptchaResult = $requestRecaptcha->overrideGlobals();
//
       //$sendEmail = $this->getContainer()->newSendMail($this->getContainer());
       //$resultSendEmail = $sendEmail($name, $first_name, $email, $message);
//
       //if ($resultSendEmail == true)
       //{
       //    $homeController = $this->getContainer()->newController('Controller\HomepageController', NULL ,$this->getContainer());
       //    return $homeController();
       //}
       //else
       //{
       //    echo $resultSendEmail;
       //}
    }
}