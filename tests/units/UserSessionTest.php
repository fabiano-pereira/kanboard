<?php

require_once __DIR__.'/Base.php';

use Core\Session;
use Model\UserSession;

class UserSessionTest extends Base
{
    public function testIsAdmin()
    {
        $s = new Session;
        $us = new UserSession($this->container);

        $this->assertFalse($us->isAdmin());

        $s['user'] = array();
        $this->assertFalse($us->isAdmin());

        $s['user'] = array('is_admin' => '1');
        $this->assertFalse($us->isAdmin());

        $s['user'] = array('is_admin' => false);
        $this->assertFalse($us->isAdmin());

        $s['user'] = array('is_admin' => '2');
        $this->assertFalse($us->isAdmin());

        $s['user'] = array('is_admin' => true);
        $this->assertTrue($us->isAdmin());
    }
}
