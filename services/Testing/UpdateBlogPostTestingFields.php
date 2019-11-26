<?php

namespace services\Testing;

use services\Testing\Interfaces\UpdateBlogPostTestingFieldsInterface;

class UpdateBlogPostTestingFields implements UpdateBlogPostTestingFieldsInterface
{
    /**
     * @param $container
     * @param $request
     * @param $session
     * @return mixed
     */
    public function updateBlogPostTestingFields($container, $request, $session)
    {
        //Testing form fields
        $validator = $container->newValidator();
        $validationForm = $container->newValidationForm($validator);

        $violationTitle = $validationForm->validateTitle($request->request->get('titre'));
        $violationResume = $validationForm->validateResume($request->request->get('chapo'));
        $violationContenu = $validationForm->validateMessage($request->request->get('contenu'));
        $violations = [$violationTitle, $violationResume, $violationContenu];

        //Get the error messages
        $verifyToken = $container->newTokenTesting()->tokenTesting($session, $request->request->get('token'));
        $verifyRecaptcha = $container->newTestingRecaptcha()->testingRecaptcha($container, $request);
        $violationMessages = $container->newViolationMessages($violations, $verifyRecaptcha, $verifyToken);
        return $violationMessages->violationMessages();
    }
}
