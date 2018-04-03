<?php

namespace App\Exceptions;

use Exception;

class InvalidEmailException extends Exception
{
    protected $code = 100;

    protected $message = "You must provide a valid e-mail address";
}
