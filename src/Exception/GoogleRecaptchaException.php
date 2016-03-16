<?php

namespace Google\Recaptcha\Controller;

use \Exception as BaseException;

class GoogleRecaptchaException extends BaseException
{
    protected $message;

    public function __construct ($message = '', $code = 0, $previous = null)
    {
        $this->message = $message;
        parent::__construct($message, $code, $previous);
    }

    public function getMessageKey ()
    {
        return $this->message;
    }
}
