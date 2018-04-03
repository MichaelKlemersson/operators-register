<?php

namespace App\Traits;

use App\Exceptions\UndefinedFieldException;
use App\Exceptions\InvalidEmailException;
use App\Exceptions\MaxLengthException;

trait OperatorValidation
{
    public function validate(array $data, $isUpdate = false)
    {
        if (
            (!$isUpdate && !isset($data['nome'])) ||
            isset($data['nome']) && !trim($data['nome'])
        ) {
            throw new UndefinedFieldException(sprintf('The field %s must be defined', 'NOME'));
        }

        if (
            (!$isUpdate && !isset($data['email'])) ||
            isset($data['email']) && !trim($data['email'])
        ) {
            throw new UndefinedFieldException(sprintf('The field %s must be defined', 'E-MAIL'));
        } else if (isset($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidEmailException;
        }

        return true;
    }
}
