<?php

namespace services\Testing;

use services\Testing\Interfaces\CommentTestingFieldsInterface;

class CommentTestingFields implements CommentTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $verifyRecaptcha
     * @return mixed
     */
    public function commentTestingFields($container, $request)
    {
        $validator = $container->newValidator();
        $validationForm = $container()->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));
        $violations = [$violationName, $violationEmail, $violationMessage];

        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha);
        return $violationMessages->violationMessages();
    }
}
