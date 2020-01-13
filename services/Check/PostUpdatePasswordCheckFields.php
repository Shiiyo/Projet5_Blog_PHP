<?php

namespace services\Check;

class PostUpdatePasswordCheckFields
{
    public function postUpdatePasswordCheckFields($container, $request, $session)
    {
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationPass1 = $validationForm->validatePassword($request->request->get('newPass1'));
        $violationPass2 = $validationForm->validatePassword($request->request->get('newPass2'));
        $violationEqual = $validationForm->validateEqualPassword($request->request->get('newPass1'), $request->request->get('newPass2'));
        $violations = [$violationPass1, $violationPass2, $violationEqual];

        //Get the error messages
        $verifyToken = $container->newTokenCheck()->tokenCheck($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newCheckRecaptcha()->checkRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
