<?php

namespace services\Check;

use services\Check\Interfaces\ConnectionCheckFieldsInterface;

class ConnectionCheckFields implements ConnectionCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function connectionCheckFields($container, $request, $session)
    {
        //Check form fields
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);
        $violationPseudo = $validationForm->validatePseudo($request->request->get('pseudo'));

        $violations = [$violationPseudo];

        //Get the error messages
        $verifyToken = $container->newTokenCheck()->tokenCheck($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newCheckRecaptcha()->checkRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
