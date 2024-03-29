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

        //Check form fields
        $error_msg = $this->container->newUpdateBlogPostCheckFields()->updateBlogPostCheckFields($this->container, $request, $this->session);

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
