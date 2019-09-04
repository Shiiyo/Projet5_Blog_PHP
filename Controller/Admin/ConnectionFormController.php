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
        $violationPseudo = $validationForm->validatePseudo($request->request->get('pseudo'));

        $violations = [$violationPseudo];

        //Get the error messages
        $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
        $error_msg = $violationMessages->violationMessages();

        if ($error_msg == "") {
            $adminLoader = $this->container->getAdminLoader($this->container);
            $admin = $adminLoader->findOneByPseudo($request->request->get('pseudo'));
            if ($admin == false) {
                $this->session->set('error', "L'identifiant ou le mot de passe est incorrect");
                $this->redirect('/admin/login');
            } else {
                $testPassword = password_verify($request->request->get('mdp'), $admin->getPassword());
                if ($testPassword == false) {
                    $this->session->set('error', "L'identifiant ou le mot de passe est incorrect");
                    $this->redirect('/admin/login');
                } else {
                    $this->session->set('uuid', $admin->getId());
                    $this->redirect('/admin/accueil');
                }
            }
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('/admin/login');
        }
    }
}
