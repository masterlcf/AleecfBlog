<?php


namespace App\Exceptions;


use Throwable;

class TokenException extends \Exception
{
    public $code = null;
    public $message = null;

    public function __construct($message = "token不存在或已失效", $code = 401, Throwable $previous = null)
    {
        $this->message = $message;
        $this->code = $code;
    }
}
