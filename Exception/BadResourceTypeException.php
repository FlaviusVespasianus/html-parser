<?php

namespace DtParser\Exception;

class BadResourceTypeException extends \InvalidArgumentException
{
    public function __construct($code, \Exception $previous = null)
    {
        $message = sprintf('Source code is of "%s" type and cannot be parsed', gettype($code));

        parent::__construct($message, null, $previous);
    }
}
