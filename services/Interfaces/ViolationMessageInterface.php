<?php

namespace services\Interfaces;

interface ViolationMessageInterface
{
    public function __construct(array $violations, $verifyRecaptcha, $verifyToken);

    /**
     * @return string
     */
    public function violationMessages();

    /**
     * @return array
     */
    public function getViolations();

    /**
     * @param array $violations
     */
    public function setViolations($violations): void;

    /**
     * @return mixed
     */
    public function getVerifyRecaptcha();

    /**
     * @param $verifyRecaptcha
     */
    public function setVerifyRecaptcha($verifyRecaptcha): void;
}
