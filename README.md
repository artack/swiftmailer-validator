> **ATTENTION:** This repository is archived and therefore readonly.

# swiftmailer-validator
swiftmailer validator to be used in symfony

## usage

`validation.yml` file

````
AppBundle\Entity\SomeEntity:
    properties:
        mail:
            - NotBlank: ~
            - Email: ~
            - Artack\Component\Validator\Constraint\SwiftmailerEmail: ~
````
