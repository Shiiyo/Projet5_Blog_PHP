<?php


namespace services;

use services\Interfaces\ValidationFormInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;

class ValidationForm implements ValidationFormInterface
{
    private $validator;

    public function __construct($validator)
    {
        $this->setValidator($validator);
    }

    public function validateName($name)
    {
        $violations = $this->getValidator()->validate($name, array(
           new Assert\NotBlank(array('message' => 'Le champ de nom ne doit pas être vide')),
           new Assert\Length(array(
               'min' => 2,
               'max' => 36,
               'minMessage' => 'Le nom doit avoir minimum {{ limit }} caractères',
               'maxMessage' => 'Le nom doit avoir maximum {{ limit }} caractères')),
           new Assert\Regex(array('pattern' => "/^\p{L}{2,}$/", 'message' => 'Le nom doit être uniquement composé de caractères alphabétiques'))
        ));
        return $violations;
    }

    public function validatePseudo($pseudo)
    {
        $violations = $this->getValidator()->validate($pseudo, array(
           new Assert\NotBlank(array('message' => 'Le champ de pseudo ne doit pas être vide')),
           new  Assert\Length(array(
               'min' => 4,
               'max' => 36,
               'minMessage' => 'Le pseudo doit avoir au minimum {{ limit }} caractères',
               'maxMessage' => 'Le pseudo doit avoir au maximum {{ limit }} caractères')),
            new Assert\Regex(array('pattern' => "/^\p{L}{2,}$/", 'message' => 'Le pseudo doit être uniquement composé de caractères alphabétiques'))
        ));
        return $violations;
    }

    public function validateEmail($email)
    {
        $violations = $this->getValidator()->validate($email, array(
           new Assert\NotBlank(array('message' => 'Le champ d\'email ne doit pas être vide')),
           new Assert\Email(array('message' => 'Le champ doit correspondre à un email valide'))
        ));
        return $violations;
    }

    public function validateMessage($message)
    {
        $violations = $this->getValidator()->validate($message, array(
           new Assert\NotBlank(array('message' => 'Le champ de message ne doit pas être vide')),
           new Assert\Type('string', array('message' => 'Le champ de message doit être une chaine de caractères'))
        ));
        return $violations;
    }

    public function validateTitle($title)
    {
        $violations = $this->getValidator()->validate($title, array(
           new Assert\NotBlank(array('message' => 'Le champ de titre ne doit pas être vide')),
           new Assert\Length(array(
             'max' => 200,
             'maxMessage' => 'Le titre doit avoir un maximum de {{ limit }} caractères'))
        ));
        return $violations;
    }

    public function validateResume($resume)
    {
        $violations = $this->getValidator()->validate($resume, array(
            new Assert\NotBlank(array('message' => 'Le champ de chapô ne doit pas être vide')),
            new Assert\Length(array(
                'max' => 255,
                'maxMessage' => 'Le chapô doit avoir un maximum de {{ limit }} caractères'))
        ));
        return $violations;
    }

    public function validatePassword($password)
    {
        $violations = $this->getValidator()->validate($password, array(
            new Assert\NotBlank(array('message' => 'Le champ de mot de passe ne doit pas être vide')),
            new Assert\Length(array(
                'min' => 6,
                'max' => 36,
                'minMessage' => 'Le mot de passe doit avoir minimum {{ limit }} caractères',
                'maxMessage' => 'Le mot de passe doit avoir maximum {{ limit }} caractères')),
        ));
        return $violations;
    }

    public function validateEqualPassword($password1, $password2)
    {
        $violations = $this->getValidator()->validate($password1, array(
           new Assert\EqualTo(array(
               'value' => $password2,
               'message' => 'Les deux mot de passes ne sont pas identiques.'
           )),
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
