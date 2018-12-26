<?php

namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class PostUpdateBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();
        //Testing Recaptcha
        $recaptchaResponse = $request->request->get('g-recaptcha-response');
        $testRecaptcha = $this->getContainer()->newTestRecaptcha($this->getContainer(), $recaptchaResponse);
        $verifyRecaptcha = $testRecaptcha();

        //Testing form fields
        $validator = $this->getContainer()->newValidator();
        $validationForm = $this->getContainer()->newValidationForm($validator);

        $violationTitle = $validationForm->validateTitle($request->request->get('titre'));
        $violationResume = $validationForm->validateResume($request->request->get('chapo'));
        $violationContenu = $validationForm->validateMessage($request->request->get('contenu'));
        $violations = [$violationTitle, $violationResume, $violationContenu];

        //Get the error messages
        $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
        $error_msg = $violationMessages->violationMessages();

        if ($error_msg == "") {
            $commentWriter = $this->container->getArticleWriter($this->container);
            $commentWriter->update($request);

            $this->session->set('success', "L'article a bien été mis à jour.");
            $this->redirect('/admin/blog-post');
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('/admin/blog-post');
        }
    }
}