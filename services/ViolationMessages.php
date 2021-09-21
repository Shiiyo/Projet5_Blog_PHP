<?php


namespace services;

use services\Interfaces\ViolationMessageInterface;

class ViolationMessages implements ViolationMessageInterface
{
    private $violations;
    private $verifyRecaptcha;
    private $verifyToken;

    /**
     * ViolationMessages constructor.
     * @param array $violations
     * @param $verifyRecaptcha
     * @param $verifyToken
     */
    public function __construct(array $violations, $verifyRecaptcha, $verifyToken)
    {
        $this->setViolations($violations);
        $this->setVerifyRecaptcha($verifyRecaptcha);
        $this->setVerifyToken($verifyToken);
    }

    /**
     * @return string
     */
    public function violationMessages()
    {
        $error_msg = "";
        $tab_error_msg = [];
        if ($this->getVerifyToken()== null) {
            if ($this->getVerifyRecaptcha()->success) {
                foreach ($this->getViolations() as $violation) {
                    if (0 !== count($violation)) {
                        $error_msg = "Un ou plusieurs champ(s) du formulaire ne sont pas valides: <br>";
                        foreach ($violation as $v) {
                            $tab_error_msg[] = "- ".$v->getMessage()."<br>";
                        }
                    }
                }
            } else {
                $error_msg = $this->getVerifyRecaptcha();
            }
        } else {
            $error_msg = $this->verifyToken;
        }

        if (0 !== count($tab_error_msg)) {
            foreach ($tab_error_msg as $tab) {
                $error_msg .= $tab;
            }
        }

        return $error_msg;
    }

    /**
     * @return array
     */
    public function getViolations()
    {
        return $this->violations;
    }

    /**
     * @param array $violations
     */
    public function setViolations($violations): void
    {
        $this->violations = $violations;
    }

    /**
     * @return mixed
     */
    public function getVerifyRecaptcha()
    {
        return $this->verifyRecaptcha;
    }

    /**
     * @param mixed $verifyRecaptcha
     */
    public function setVerifyRecaptcha($verifyRecaptcha): void
    {
        $this->verifyRecaptcha = $verifyRecaptcha;
    }

    /**
     * @return mixed
     */
    public function getVerifyToken()
    {
        return $this->verifyToken;
    }

    /**
     * @param mixed $verifyToken
     */
    public function setVerifyToken($verifyToken): void
    {
        $this->verifyToken = $verifyToken;
    }
}
