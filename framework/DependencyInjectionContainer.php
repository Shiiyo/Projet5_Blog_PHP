<?php

namespace framework;

use Entity\Article;
use framework\Session\PHPSession;
use services\ArticlesManagement\ArticleCollection;
use services\ArticlesManagement\ArticleHydrator;
use services\ArticlesManagement\ArticleLoader;
use services\ArticlesManagement\PDOArticleStorage;
use services\SendEmail;
use services\TestRecaptcha;
use services\ValidationForm;
use services\ViolationMessages;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PHPMailer\PHPMailer\PHPMailer;
use Symfony\Component\Validator\Validation;

class DependencyInjectionContainer
{
    protected $parameters;
    protected $twigEnv;
    protected $pdo;
    protected $articleStorage;
    protected $articleLoader;

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

    public function newArticle()
    {
        return new Article();
    }

    public function newArticleCollection($articlesArray)
    {
        return new ArticleCollection($articlesArray);
    }

    public function newArticleHydrator()
    {
        return new ArticleHydrator();
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
