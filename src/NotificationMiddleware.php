<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Laasti\Notifications;

use Laasti\Stack\MiddlewareInterface;
use Laasti\Stack\MiddlewareTerminableInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Description of AuthenticationMiddleware
 *
 * @author Sonia
 */
class NotificationMiddleware implements MiddlewareInterface, MiddlewareTerminableInterface
{
    
    /**
     *
     * @var SessionInterface 
     */
    protected $service;
    
    public function __construct(NotificationService $service)
    {
        $this->service = $service;
    }
    
    
    public function handle(Request $request)
    {
        return $request;
    }
    
    public function terminate(Request $request, Response $response)
    {
        $this->service->send();
    }
}
