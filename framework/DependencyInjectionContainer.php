<?php

namespace framework;

use framework\Session\PHPSession;
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
        return Request::createFromGlobals();
    }

    public function createHttpRequest($url, $method, $params)
    {
        return Request::create($url, $method, $params);
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
     * @param $num
     * @return mixed
     */
    public function getParam($path) : \SimpleXMLElement
    {
        return $this->parameters->xpath($path)[0];
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
