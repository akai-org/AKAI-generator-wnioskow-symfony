<?php

namespace App\Listeners;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class CorsListener
{
    public function onKernelResponse(ResponseEvent $event)
    {
        if (!str_starts_with($event->getRequest()->getRequestUri(), "/api")) {
            return;
        }
        $response = $event->getResponse();
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', ['GET', 'POST', 'OPTIONS']);
        $response->headers->set('Access-Control-Allow-Headers', '*');
        if ($event->getRequest()->getMethod() == "OPTIONS") {
            $response->setStatusCode(Response::HTTP_NO_CONTENT);
        }
    }
}
