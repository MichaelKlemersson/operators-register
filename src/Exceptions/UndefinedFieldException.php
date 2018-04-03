<?php

namespace App\Exceptions;

use Exception;

class UndefinedFieldException extends Exception
{
    protected $code = 102;
}
