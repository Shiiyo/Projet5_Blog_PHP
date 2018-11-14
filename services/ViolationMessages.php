<?php


namespace services;

class ViolationMessages
{
    private $violations;
    private $verifyRecaptcha;

    /**
     * ViolationMessages constructor.
     * @param array $violations
     * @param $verifyRecaptcha
     */
    public function __construct(array $violations, $verifyRecaptcha)
    {
        $this->setViolations($violations);
        $this->setVerifyRecaptcha($verifyRecaptcha);
    }

    /**
     * @return string
     */
    public function violationMessages()
    {
        $error_msg = "";
        $tab_error_msg = [];
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
            $error_msg = "Le recaptcha a échoué, merci d'essayer à nouveau.";
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
    private function setViolations($violations): void
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
    private function setVerifyRecaptcha($verifyRecaptcha): void
    {
        $this->verifyRecaptcha = $verifyRecaptcha;
    }
}
