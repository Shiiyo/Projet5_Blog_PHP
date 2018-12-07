<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class ConnectionFormController implements ControllerInterface
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
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));

        $violations = [$violationEmail];

        //Get the error messages
        $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
        $error_msg = $violationMessages->violationMessages();

        if ($error_msg == "") {

            $this->redirect('/accueil');
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('/admin/login');
        }
    }
}