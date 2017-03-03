<?php


namespace Artack\Component\Validator\Constraint;


use Symfony\Component\Validator\Constraint;

class SwiftmailerEmail extends Constraint
{

    public $message = 'This value is not a valid email address.';

}
