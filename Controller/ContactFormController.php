<?php


namespace Controller;

use services\ValidationForm;
use Symfony\Component\Validator\Validation;

class ContactFormController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();
        $error_msg = $this->container->newContactCheckFields()->contactCheckFields($this->container, $request, $this->session);

        //Sending Email
        if ($error_msg == "") {
            $sendEmail = $this->getContainer()->newSendMail($this->getContainer());
            $resultSendEmail = $sendEmail($request->request->get('nom'), $request->request->get('prenom'), $request->request->get('email'), $request->request->get('message'));

            if ($resultSendEmail == true) {
                $this->session->set('success', "Merci pour votre message.<br>Je vous répondrais dans les meilleurs délais.");
                $this->redirect('/accueil#contact');
            }
            $this->session->set('error', $resultSendEmail);
            $this->redirect('/accueil#contact');
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('/accueil#contact');
        }
    }
}
