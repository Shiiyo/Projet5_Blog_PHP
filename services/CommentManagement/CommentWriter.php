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

    /**
     * @param $request
     * @return mixed|void
     * @throws \Exception
     */
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

    /**
     * @param $commentId
     * @return mixed
     */
    public function accepted($commentId)
    {
        return $this->commentStorage->accepted($commentId);
    }

    /**
     * @param $commentId
     * @return mixed
     */
    public function refused($commentId)
    {
        return $this->commentStorage->refused($commentId);
    }
}
