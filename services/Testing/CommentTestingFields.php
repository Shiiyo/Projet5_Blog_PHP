<?php

namespace services\Testing;

use services\Testing\Interfaces\CommentTestingFieldsInterface;

class CommentTestingFields implements CommentTestingFieldsInterface
{

    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function commentTestingFields($container, $request, $session)
    {
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));
        $violations = [$violationName, $violationEmail, $violationMessage];

        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $verifyToken = $container->newTokenTesting()->tokenTesting($session, $request->request->get('token'));
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
