<?php

namespace App\Exceptions;

use Exception;

class CanNotGetTokenException extends Exception
{
    public $message="can not get token";
}
