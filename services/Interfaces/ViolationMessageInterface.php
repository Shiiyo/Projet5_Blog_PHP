<?php

namespace services\Interfaces;

interface ViolationMessageInterface
{
    /**
     * ViolationMessageInterface constructor.
     * @param array $violations
     * @param $verifyRecaptcha
     */
    public function __construct(array $violations, $verifyRecaptcha);

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
