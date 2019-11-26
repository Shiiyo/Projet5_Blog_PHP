<?php

namespace Controller;

class CommentFormController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();
        $error_msg = $this->container->newCommentTestingFields()->commentTestingFields($this->container, $request, $this->session);

        if ($error_msg == "") {
            $this->container->getCommentWriter($this->container)->write($request);

            $this->session->set('success', "Merci pour votre commentaire, il sera lu et validé dans les meilleurs délais.");
            $this->redirect('blog-post/'.$request->request->get('slug'));
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('blog-post/'.$request->request->get('slug'));
        }
    }
}
