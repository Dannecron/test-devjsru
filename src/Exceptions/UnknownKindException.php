<?php
namespace Dogs\Exceptions;

class UnknownKindException extends ApplicationException
{
    public function __construct(string $kind, \Throwable $previous = null)
    {
        $message = "Kind {$kind} is not defined";
        return parent::__construct($message, 400, $previous);
    }
}
