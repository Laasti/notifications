<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Laasti\Notifications;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Description of NotificationService
 *
 * @author Sonia
 */
class NotificationService
{
    protected $messages = array();
    protected $session;
    
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function send() {
        $this->session->getFlashBag()->setAll($this->all());
    }

    public function add($type, $msg) {
        $this->messages[$type][] = $msg;
        return $this;
    }

    public function success($msg) {
        $this->add('success', $msg);
        return $this;
    }

    public function error($msg) {
        $this->add('error', $msg);
        return $this;
    }

    public function warning($msg) {
        $this->add('warning', $msg);
        return $this;
    }

    public function info($msg) {
        $this->add('info', $msg);
        return $this;
    }

    public function all() {
        return $this->messages;
    }
}
