<?php

namespace App\Exceptions;

use Exception;

class MaxLengthException extends Exception
{
    protected $code = 101;

    protected $message = "The field %s can't exceeds %d characteres";

    public function __contruct(string $field, int $length)
    {
        parent::__contruct($this->code, sprintf($this->message, $field, $length));
    }
}
