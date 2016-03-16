<?php

namespace Google\Recaptcha\GoogleRecaptchaBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Google\Recaptcha\GoogleRecaptchaBundle\Model\GoogleRecaptchaManager;
use ReCaptcha\ReCaptcha as GoogleRecaptcha;

class GoogleRecaptchaFactory
{
    private $container;

    public function __construct (ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getGoogleRecaptchaManager ()
    {
        $config = $this->container->getParameter('google.recaptcha');

        return new GoogleRecaptchaManager(new GoogleRecaptcha($config['auth']['secretkey']))
    }
}
