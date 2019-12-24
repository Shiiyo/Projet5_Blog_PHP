<?php

namespace services\Check;

use services\Check\Interfaces\CommentCheckFieldsInterface;

class CommentCheckFields implements CommentCheckFieldsInterface
{

    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function commentCheckFields($container, $request, $session)
    {
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));
        $violations = [$violationName, $violationEmail, $violationMessage];

        $verifyRecaptcha = $container->newCheckRecaptcha()->checkRecaptcha($container, $request);
        $verifyToken = $container->newTokenCheck()->tokenCheck($session, $request->request->get('token'));
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
