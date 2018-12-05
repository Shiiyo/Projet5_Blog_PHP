<?php

namespace services\CommentManagement;

use Ramsey\Uuid\Uuid;
use services\CommentManagement\Interfaces\CommentWriterInterface;

class CommentWriter implements CommentWriterInterface
{
    private $commentStorage;
    private $container;
    private $commentBuilder;

    /**
     * CommentWriter constructor.
     * @param $commentStorage
     * @param $container
     */
    public function __construct($commentStorage, $container)
    {
        $this->commentStorage = $commentStorage;
        $this->container = $container;
    }

    public function write($request)
    {
        $commentArray = [
            'id' => Uuid::uuid4(),
            'id_blog_post' => $request->request->get('id_blog_post'),
            'pseudo' => $request->request->get('nom'),
            'message' => $request->request->get('message'),
            'email' => $request->request->get('email'),
            'validation' => 0,
            'add_date' => date('Y-m-d H:i:s')
        ];

        if ($this->commentBuilder === null) {
            $this->commentBuilder = $this->container->newCommentBuilder();
        }

        $comment = $this->commentBuilder->build($commentArray);
        $this->commentStorage->save($comment);
    }
}
