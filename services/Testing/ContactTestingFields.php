<?php

namespace services\Testing;

use services\Testing\Interfaces\ContactTestingFieldsInterface;

class ContactTestingFields implements ContactTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $verifyRecaptcha
     * @return mixed
     */
    public function contactTestingFields($container, $request)
    {
        $validator = $container()->newValidator();

        $validationForm = $container()->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));

        $violations = [$violationName, $violationFirstName, $violationEmail, $violationMessage];

        //Get the error messages
        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha);
        return $violationMessages->violationMessages();
    }
}
