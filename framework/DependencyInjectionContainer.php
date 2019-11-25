<?php

namespace framework;

use Entity\Admin;
use Entity\Article;
use Entity\Comment;
use framework\Session\PHPSession;
use services\AdminManagement\AdminCollection;
use services\AdminManagement\AdminDeleter;
use services\AdminManagement\AdminHydrator;
use services\AdminManagement\AdminLoader;
use services\AdminManagement\AdminWriter;
use services\AdminManagement\DeleteAdmin;
use services\AdminManagement\PDOAdminStorage;
use services\AdminManagement\AdminTestExistingPseudo;
use services\ArticlesManagement\ArticleCollection;
use services\ArticlesManagement\ArticleDeleter;
use services\ArticlesManagement\ArticleHydrator;
use services\ArticlesManagement\ArticleLoader;
use services\ArticlesManagement\ArticleWriter;
use services\ArticlesManagement\PDOArticleStorage;
use services\Builders\AdminBuilder;
use services\Builders\ArticleBuilder;
use services\Builders\CommentBuilder;
use services\CommentManagement\CloseComment;
use services\CommentManagement\CommentCollection;
use services\CommentManagement\CommentHydrator;
use services\CommentManagement\CommentLoader;
use services\CommentManagement\CommentWriter;
use services\CommentManagement\PDOCommentStorage;
use services\CommentManagement\PutOnlineComment;
use services\EndParamURI;
use services\RefreshPopup;
use services\Research\SearchAdmin;
use services\Research\SearchArticle;
use services\Research\SearchArticleCollection;
use services\Research\SearchComment;
use services\SendEmail;
use services\AdminLogIn;
use services\Testing\CommentTestingFields;
use services\Testing\ConnectionTestingFields;
use services\Testing\ContactTestingFields;
use services\Testing\PostNewAdminAccountTestingFields;
use services\Testing\PostNewBlogPostTestingFields;
use services\Testing\TestingRecaptcha;
use services\Testing\UpdateBlogPostTestingFields;
use services\TestRecaptcha;
use services\ValidationForm;
use services\ViolationMessages;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Validator\Validation;
use Cocur\Slugify\Slugify;

class DependencyInjectionContainer
{
    protected $parameters;
    protected $twigEnv;
    protected $pdo;
    protected $articleStorage;
    protected $articleLoader;
    protected $adminStorage;
    protected $adminLoader;
    protected $commentStorage;
    protected $commentLoader;
    protected $commentWriter;
    protected $articleWriter;
    protected $adminWriter;
    protected $adminTestExistingPseudo;

    public function __construct(\SimpleXMLElement $parameters)
    {
        $this->setParameters($parameters);
    }

    public function newRouter($container)
    {
        return new Router($container);
    }

    public function newUrlRoutingResolver($container, $url)
    {
        return new UrlRoutingResolver($container, $url);
    }

    public function newRoute($controller, $path)
    {
        return new Route($controller, $path);
    }

    public function newControllerLoader()
    {
        return new ControllerLoader();
    }

    public function newController($path, $params, $container)
    {
        return new $path($params, $this->getTwigEnv(), $container);
    }

    public function newTwigLoaderFilesystem($path)
    {
        return new \Twig_Loader_Filesystem($path);
    }

    public function newTwigEnvironment($loader, $params = [])
    {
        $twigEnv = new \Twig_Environment($loader, $params);
        $twigEnv->addExtension(new \Twig_Extension_Debug());
        $this->setTwigEnv($twigEnv);
    }

    public function newHttpResponseHtml($view)
    {
        return new Response(
            $view,
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );
    }

    public function newHttpRequest()
    {
        $req = new Request();
        return $req->createFromGlobals();
    }

    public function createHttpRequest($url, $method, $params)
    {
        $req = new Request();
        return $req->create($url, $method, $params);
    }

    public function newPHPMailer()
    {
        return new PHPMailer;
    }

    public function newSendMail($container)
    {
        return new SendEmail($container);
    }

    public function newTestRecaptcha($container, $recaptchaResponse)
    {
        return new TestRecaptcha($container, $recaptchaResponse);
    }

    public function newValidator()
    {
        return Validation::createValidator();
    }

    public function newValidationForm($validator)
    {
        return new ValidationForm($validator);
    }

    public function newViolationMessages(array $violations, $verifyRecaptcha)
    {
        return new ViolationMessages($violations, $verifyRecaptcha);
    }

    public function newPHPSession()
    {
        return new PHPSession();
    }

    public function newArticleCollection($articlesArray)
    {
        return new ArticleCollection($articlesArray);
    }

    public function newEndParamURI()
    {
        return new EndParamURI();
    }

    public function newCommentCollection($commentsArray)
    {
        return new CommentCollection($commentsArray);
    }

    public function newAdminBuilder()
    {
        return new AdminBuilder();
    }

    public function newAdminCollection($adminArray)
    {
        return new AdminCollection($adminArray);
    }

    public function newArticleBuilder()
    {
        return new ArticleBuilder();
    }

    public function newCommentBuilder()
    {
        return new CommentBuilder();
    }

    public function newAdminLogIn()
    {
        return new AdminLogIn();
    }

    public function newSlugify()
    {
        return new Slugify();
    }

    public function newArticleDeleter()
    {
        return new ArticleDeleter($this->getArticleStorage());
    }

    public function newAdminDeleter()
    {
        return new AdminDeleter($this->getAdminStorage());
    }

    public function newSearchArticle()
    {
        return new SearchArticle();
    }

    public function newSearchAdmin()
    {
        return new SearchAdmin();
    }

    public function newSearchComment()
    {
        return new SearchComment();
    }

    public function newRefreshPopup()
    {
        return new RefreshPopup();
    }

    public function newTestingRecaptcha()
    {
        return new TestingRecaptcha();
    }

    public function newCommentTestingFields()
    {
        return new CommentTestingFields();
    }

    public function newContactTestingFields()
    {
        return new ContactTestingFields();
    }

    public function newTestAdminLogin()
    {
        return new AdminLogIn();
    }

    public function newCloseComment()
    {
        return new CloseComment();
    }

    public function newPutOnlineComment()
    {
        return new PutOnlineComment();
    }

    public function newPostNewAdminAccountTestingFields()
    {
        return new PostNewAdminAccountTestingFields();
    }

    public function newPostNewBlogPostTestingFields()
    {
        return new PostNewBlogPostTestingFields();
    }

    public function newUpdateBlogPostTestingFields()
    {
        return new UpdateBlogPostTestingFields();
    }

    public function newConnectionTestingFields()
    {
        return new ConnectionTestingFields();
    }

    public function newDeleteAdmin()
    {
        return new DeleteAdmin();
    }

    public function newSearchArticleCollection()
    {
        return new SearchArticleCollection();
    }

    /**
     * @param $num
     * @return mixed
     */
    public function getParam($path) : \SimpleXMLElement
    {
        return $this->parameters->xpath($path)[0];
    }

    /**
     * @return \PDO
     */
    public function getPDO()
    {
        if ($this->pdo === null) {
            $this->pdo = new \PDO($this->getParam('PDO/db_dsn'), $this->getParam('PDO/db_user'), $this->getParam('PDO/db_pass'));
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    public function getArticleLoader($container)
    {
        if ($this->articleLoader === null) {
            $this->articleLoader = new ArticleLoader($this->getArticleStorage(), $container);
        }
        return $this->articleLoader;
    }

    public function getArticleStorage()
    {
        if ($this->articleStorage === null) {
            $this->articleStorage = new PDOArticleStorage($this->getPDO());
        }
        return $this->articleStorage;
    }

    public function getAdminLoader($container)
    {
        if ($this->adminLoader === null) {
            $this->adminLoader = new AdminLoader($this->getAdminStorage(), $container);
        }
        return $this->adminLoader;
    }

    public function getAdminStorage()
    {
        if ($this->adminStorage === null) {
            $this->adminStorage = new PDOAdminStorage($this->getPDO());
        }
        return $this->adminStorage;
    }

    public function getCommentLoader($container)
    {
        if ($this->commentLoader === null) {
            $this->commentLoader = new CommentLoader($this->getCommentStorage(), $container);
        }
        return $this->commentLoader;
    }

    public function getCommentStorage()
    {
        if ($this->commentStorage === null) {
            $this->commentStorage = new PDOCommentStorage($this->getPDO());
        }
        return $this->commentStorage;
    }

    public function getCommentWriter($container)
    {
        if ($this->commentWriter === null) {
            $this->commentWriter = new CommentWriter($this->getCommentStorage(), $container);
        }
        return $this->commentWriter;
    }

    public function getArticleWriter($container)
    {
        if ($this->articleWriter === null) {
            $this->articleWriter = new ArticleWriter($this->getArticleStorage(), $container);
        }
        return $this->articleWriter;
    }

    public function getAdminWriter($container)
    {
        if ($this->adminWriter === null) {
            $this->adminWriter = new AdminWriter($this->getAdminStorage(), $container);
        }
        return $this->adminWriter;
    }

    public function getAdminTestExistingPseudo($container)
    {
        if ($this->adminTestExistingPseudo === null) {
            $this->adminTestExistingPseudo = new AdminTestExistingPseudo($container);
        }
        return $this->adminTestExistingPseudo;
    }

    //GETTERS

    /**
     * @return \Twig_Environment
     */
    public function getTwigEnv() : \Twig_Environment
    {
        return $this->twigEnv;
    }

    /**
     * @return array
     */
    public function getParameters() : \SimpleXMLElement
    {
        return $this->parameters;
    }

    /**
     * @param \Twig_Environment $twigEnv
     */
    private function setTwigEnv(\Twig_Environment $twigEnv): void
    {
        $this->twigEnv = $twigEnv;
    }

    public function setParameters($parameters): void
    {
        $this->parameters = $parameters;
    }
}
