<?php


namespace Controller\Admin;

use Controller\ControllerInterface;
use Controller\ControllerTrait;

class PostNewBlogPostController implements ControllerInterface
{
    use ControllerTrait;

    public function __invoke()
    {
        $request = $this->getContainer()->newHttpRequest();

        //Testing form fields
        $error_msg = $this->container->newPostNewBlogPostTestingFields()->postNewBlogPostTestingFields($this->container, $request);

        if ($error_msg == "") {
            $this->container->getArticleWriter($this->container)->write($request);

            $this->session->set('success', "L'article est bien enregistré et publié sur le blog.");
            $this->redirect('/admin/ajouter-blog-post');
        } else {
            $this->session->set('error', $error_msg);
            $this->redirect('/admin/ajouter-blog-post');
        }
    }
}
