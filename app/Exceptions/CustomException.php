<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    protected $status;

    public function __construct($message = "Something went wrong", $status = 400)
    {
        parent::__construct($message);
        $this->status = $status;
    }

    public function getStatusCode()
    {
        return $this->status;
    }   
}
