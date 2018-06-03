<?php
namespace Dogs\Exceptions;

class UnknownActionException extends ApplicationException
{
    /**
     * @param string $action
     * @param \Trowable $previous
     */
    public function __construct(string $action, \Trowable $previous = null)
    {
        $message = "Dog can not do action: {$action}";
        parent::__construct($message, 400, $previous);
    }
}
