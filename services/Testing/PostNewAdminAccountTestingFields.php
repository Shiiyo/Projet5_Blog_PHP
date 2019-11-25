<?php

namespace services\Testing;

use services\Testing\Interfaces\PostNewAdminAccountTestingFieldsInterface;

class PostNewAdminAccountTestingFields implements PostNewAdminAccountTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $verifyRecaptcha
     * @return mixed
     */
    public function postNewAdminAccountTestingFields($container, $request)
    {
        $validator = $container()->newValidator();
        $validationForm = $container()->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationFirstName = $validationForm->validateName($request->request->get('prenom'));
        $violationPseudo = $validationForm->validatePseudo($request->get('pseudo'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationPassword1 = $validationForm->validatePassword($request->request->get('mdp1'));
        $violationPassword2 = $validationForm->validatePassword($request->request->get('mdp2'));
        $violationEqualPassword = $validationForm->validateEqualPassword($request->request->get('mdp1'), $request->request->get('mdp2'));
        $violations = [$violationName, $violationFirstName, $violationPseudo, $violationEmail, $violationPassword1, $violationPassword2, $violationEqualPassword];

        //Get the error messages
        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
        return $violationMessages->violationMessages();
    }
}
