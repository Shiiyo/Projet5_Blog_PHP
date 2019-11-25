<?php

namespace services\Testing;

use services\Testing\Interfaces\ConnectionTestingFieldsInterface;

class ConnectionTestingFields implements ConnectionTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $recaptcha
     * @return mixed
     */
    public function connectionTestingFields($container, $request)
    {
        //Testing form fields
        $validator = $container()->newValidator();
        $validationForm = $container()->newValidationForm($validator);
        $violationPseudo = $validationForm->validatePseudo($request->request->get('pseudo'));

        $violations = [$violationPseudo];

        //Get the error messages
        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $container()->newViolationMessages($violations, $verifyRecaptcha);
        return $violationMessages->violationMessages();
    }
}
