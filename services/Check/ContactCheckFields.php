<?php

namespace services\Check;

use services\Check\Interfaces\ContactCheckFieldsInterface;

class ContactCheckFields implements ContactCheckFieldsInterface
{

    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function contactCheckFields($container, $request, $session)
    {
        $validator = $container->newValidator();

        $validationForm = $container->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));
        $violations = [$violationName, $violationFirstName, $violationEmail, $violationMessage];

        //Get the error messages
        $verifyToken = $container->newTokenCheck()->tokenCheck($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newCheckRecaptcha()->checkRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
