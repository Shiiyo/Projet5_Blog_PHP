<?php

namespace Controller;

class CommentFormController implements ControllerInterface
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

        $violationName = $validationForm->validateName($request->request->get('nom'));
        $violationEmail = $validationForm->validateEmail($request->request->get('email'));
        $violationMessage = $validationForm->validateMessage($request->request->get('message'));
        $violations = [$violationName, $violationEmail, $violationMessage];

        //Get the error messages
        $violationMessages = $this->getContainer()->newViolationMessages($violations, $verifyRecaptcha);
        $error_msg = $violationMessages->violationMessages();

        if ($error_msg == "") {
            $commentWriter = $this->container->getCommentWriter($this->container);
            $commentWriter->write($request);

            $this->session->set('success', "Merci pour votre commentaire, il sera lu et validé dans les meilleurs délais.");
            $this->redirect('blog-post/'.$request->request->get('slug'));
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('blog-post/'.$request->request->get('slug'));
        }
    }
}
