<?php

namespace services\Testing;

use services\Testing\Interfaces\ConnectionTestingFieldsInterface;

class ConnectionTestingFields implements ConnectionTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function connectionTestingFields($container, $request, $session)
    {
        //Testing form fields
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);
        $violationPseudo = $validationForm->validatePseudo($request->request->get('pseudo'));

        $violations = [$violationPseudo];

        //Get the error messages
        $verifyToken = $container->newTokenTesting()->tokenTesting($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
