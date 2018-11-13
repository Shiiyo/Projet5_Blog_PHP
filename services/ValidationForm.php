<?php


namespace services;


use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class ValidationForm
{
    private $validator;

    public function __construct($validator)
    {
        $this->setValidator($validator);
    }

    public function validateName($name)
    {
        $violations = $this->getValidator()->validate($name, array(
           new Assert\NotBlank(),
           new Assert\Length(array('min' => 2, 'max' => 30)),
           new Assert\Regex(array('pattern' => "/^\p{L}{2,}$/"))
        ));
        return $violations;
    }

    public function validateEmail($email)
    {
        $violations = $this->getValidator()->validate($email, array(
           new Assert\NotBlank(),
           new Assert\Email()
        ));
        return $violations;
    }

    public function validateMessage($message)
    {
        $violations = $this->getValidator()->validate($message, array(
           new Assert\NotBlank(),
           new Assert\Type('string')
        ));
        return $violations;
    }

    /**
     * @return Validation
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param Validation $validator
     */
    public function setValidator($validator): void
    {
        $this->validator = $validator;
    }
}