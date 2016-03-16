<?php

namespace Google\Recaptcha\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Google\Recaptcha\Exception\GoogleRecaptchaException;


class GoogleRecaptchaController extends Controller
{
    public function showAction(Request $request)
    {
        if (Request::METHOD_GET === $request->getMethod()) {
            $config = $this->getParameter('google.recaptcha');
            return $this->render(
                'GoogleRecaptchaBundle:GoogleRecaptcha:show.html.twig',
                array (
                    'google_recaptcha_auth_sitekey' => $config['auth']['sitekey'],
                    'google_recaptcha_messages_helptext' => $config['messages']['helptext'],
                    'google_recaptcha_api' => $config['api'],
                    'google_recaptcha_locale' => $request->request->get('google_recaptcha_locale', 'en'),
                )
            );
        }

        throw new GoogleRecaptchaException('InvalidHTTPMethodException:');
    }

    public function verifyAction(Request $request)
    {
        if (Request::METHOD_POST === $request->getMethod()) {
            $googleRecaptchManager = $this->get('google.recaptcha.factory')->getGoogleRecaptchaManager();
            $googleRecaptchaResponse = $request->request->get('g-recaptcha-response', NULL);
            $clientIp = $request->getClientIp();
            return $googleRecaptchManager->verify($googleRecaptchaResponse, $clientIp);
        }

        throw new GoogleRecaptchaException('InvalidHTTPMethodException:');
    }
}
