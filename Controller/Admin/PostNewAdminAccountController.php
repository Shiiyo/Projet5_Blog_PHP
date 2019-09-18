<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class PostNewAdminAccountController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $testAdminLogIn = $this->container->newTestAdminLogIn();
        $adminLogIn = $testAdminLogIn->testLogIn($this->session->get('uuid'), $this->container);

        if ($adminLogIn != false) {
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
            $violationPseudo = $validationForm->validatePseudo($request->get('pseudo'));
            $violationEmail = $validationForm->validateEmail($request->request->get('email'));
            $violationPassword1 = $validationForm->validatePassword($request->request->get('mdp1'));
            $violationPassword2 = $validationForm->validatePassword($request->request->get('mdp2'));
            $violationEqualPassword = $validationForm->validateEqualPassword($request->request->get('mdp1'), $request->request->get('mdp2'));
            $violations = [$violationName, $violationFirstName, $violationPseudo, $violationEmail, $violationPassword1, $violationPassword2, $violationEqualPassword];

            //Get the error messages
            $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
            $error_msg = $violationMessages->violationMessages();

            if ($error_msg == "") {
                $adminWriter = $this->container->getAdminWriter($this->container);
                $returnWriter = $adminWriter->write($request);

                if ($returnWriter == true)
                {
                    $this->session->set('success', "Le compte administrateur est bien enregistré.");
                    $this->redirect('/admin/compte');
                }
                else
                {
                    $this->session->set('error', $returnWriter);
                    $this->redirect('/admin/compte');
                }
            } else {
                $this->session->set('error', $error_msg);
                $this->redirect('/admin/compte');
            }
        } else {
            $this->session->delete('uuid');
            $this->redirect('/admin/login');
        }
    }
}
