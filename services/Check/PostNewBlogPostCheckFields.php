<?php

namespace services\Check;

use services\Check\Interfaces\PostNewBlogPostCheckFieldsInterface;

class PostNewBlogPostCheckFields implements PostNewBlogPostCheckFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function postNewBlogPostCheckFields($container, $request, $session)
    {
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationTitle = $validationForm->validateTitle($request->request->get('titre'));
        $violationResume = $validationForm->validateResume($request->request->get('chapo'));
        $violationContenu = $validationForm->validateMessage($request->request->get('contenu'));
        $violations = [$violationTitle, $violationResume, $violationContenu];

        //Get the error messages
        $verifyToken = $container->newTokenCheck()->tokenCheck($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newCheckRecaptcha()->checkRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
