<?php

namespace Google\Recaptcha\Controller;

use ReCaptcha\ReCaptcha as GoogleRecaptcha;
use Google\Recaptcha\Exception\GoogleRecaptchaException;

class GoogleRecaptchaManager
{
    private $googleRecaptcha;

    public function __construct (GoogleRecaptcha $googleRecaptcha)
    {
        $this->googleReCaptcha = $googleRecaptcha;
    }

    public function verify ($googleRecaptcaResponse, $clientIp)
    {
        $response = $this->googleRecaptcha->verify($googleRecaptcaResponse, $clientIp);

        if (true === $response->isSuccess()) {
            return $response;
        }

        throw new GoogleRecaptchaException('InvalidResponseException:');
    }
}
