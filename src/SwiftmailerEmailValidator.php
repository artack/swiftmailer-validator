<?php


namespace Artack\Component\Validator\Constraint;


use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class SwiftmailerEmailValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (null === $value || '' === $value) {
            return;
        }

        $this->grammer = new \Swift_Mime_Grammar();

        if (!$this->isValid($value)) {
            if ($this->context instanceof ExecutionContextInterface) {
                $this->context->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
                    ->addViolation();
            } else {
                $this->buildViolation($constraint->message)
                    ->setParameter('{{ value }}', $this->formatValue($value))
                    ->addViolation();
            }
        }
    }

    /**
     * @param string $value
     * @return bool
     */
    private function isValid($value)
    {
        $grammer = new \Swift_Mime_Grammar();;

        return (bool) preg_match('/^'.$grammer->getDefinition('addr-spec').'$/D', $value);
    }
}
