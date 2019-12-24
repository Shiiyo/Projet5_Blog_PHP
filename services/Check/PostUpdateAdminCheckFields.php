<?php

namespace services\Check;

use services\Check\Interfaces\PostUpdateAdminCheckFieldsInterface;

class PostUpdateAdminCheckFields implements PostUpdateAdminCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postUpdateAdminCheckFields($container, $request, $session)
    {
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationPseudo = $validationForm->validatePseudo($request->get('pseudo'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violations = [$violationName, $violationFirstName, $violationPseudo, $violationEmail];

        //Get the error messages
        $verifyToken = $container->newTokenCheck()->tokenCheck($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newCheckRecaptcha()->checkRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}