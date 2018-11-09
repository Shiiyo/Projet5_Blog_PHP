<?php


namespace Controller;


use Entity\ContactForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ContactFormController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();

        $name = $request->request->get('nom');
        $first_name = $request->request->get('prenom');
        $email = $request->request->get('email');
        $message = $request->request->get('message');
        $recaptchaResponse = $request->request->get('g-recaptcha-response');

        $validator = Validation::createValidator();

        $this->contactForm($validator, $name, $first_name, $email, $message, $recaptchaResponse);

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

    public function contactForm(ValidatorInterface $validator, $name, $first_name, $email, $message, $recaptchaResponse)
    {
        $contactForm = new ContactForm($name, $first_name, $email, $message, $recaptchaResponse);
        $errors = $validator->validate($contactForm);
        if(count($errors) > 0)
        {
            $errorsString = (string) $errors;
            return new Response($errorsString);
        }
        return new Response('Le formulaire est conforme!');
    }
}