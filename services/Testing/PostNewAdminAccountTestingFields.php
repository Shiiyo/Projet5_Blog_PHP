<?php

namespace services\Testing;

use services\Testing\Interfaces\PostNewAdminAccountTestingFieldsInterface;

class PostNewAdminAccountTestingFields implements PostNewAdminAccountTestingFieldsInterface
{

    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postNewAdminAccountTestingFields($container, $request, $session)
    {
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationPseudo = $validationForm->validatePseudo($request->get('pseudo'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationPassword1 = $validationForm->validatePassword($request->request->get('mdp1'));
        $violationPassword2 = $validationForm->validatePassword($request->request->get('mdp2'));
        $violationEqualPassword = $validationForm->validateEqualPassword($request->request->get('mdp1'), $request->request->get('mdp2'));
        $violations = [$violationName, $violationFirstName, $violationPseudo, $violationEmail, $violationPassword1, $violationPassword2, $violationEqualPassword];

        //Get the error messages
        $verifyToken = $container->newTokenTesting()->tokenTesting($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
