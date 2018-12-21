<?php

namespace services\ArticlesManagement;

use Ramsey\Uuid\Uuid;
use services\ArticlesManagement\Interfaces\ArticleWriterInterface;

class ArticleWriter implements ArticleWriterInterface
{
    private $articleStorage;
    private $container;
    private $articleBuilder;

    public function __construct($articleStorage, $container)
    {
        $this->articleStorage = $articleStorage;
        $this->container = $container;
    }

    public function write($request)
    {
        $slugify = $this->container->newSlugify();

        $articleArray = [
            'id' => Uuid::uuid4(),
            'id_admin' => $request->request->get('id_admin'),
            'title' => $request->request->get('titre'),
            'slug' => $slugify->slugify($request->request->get('titre')),
            'resume' => $request->request->get('chapo'),
            'content' => $request->request->get('contenu'),
            'add_date' => date('Y-m-d H:i:s'),
            'update_date' => date('Y-m-d H:i:s')
        ];

        if ($this->articleBuilder === null) {
            $this->articleBuilder = $this->container->newArticleBuilder();
        }

        $article = $this->articleBuilder->build($articleArray);
        $this->articleStorage->save($article);
    }

    public function update($request)
    {
        $slugify = $this->container->newSlugify();
        $articleArray = [
            'id' => $request->request->get('id'),
            'id_admin' => $request->request->get('auteur'),
            'title' => $request->request->get('titre'),
            'slug' => $slugify->slugify($request->request->get('titre')),
            'resume' => $request->request->get('chapo'),
            'content' => $request->request->get('contenu'),
            'add_date' => $request->request->get('add_date'),
            'update_date' => date('Y-m-d H:i:s')
        ];

        if ($this->articleBuilder === null) {
            $this->articleBuilder = $this->container->newArticleBuilder();
        }

        $article = $this->articleBuilder->build($articleArray);
        $this->articleStorage->update($article);
    }
}
