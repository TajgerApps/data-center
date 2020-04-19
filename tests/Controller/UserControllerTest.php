<?php

declare(strict_types=1);

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndexRoute(): void
    {
        $client = static::createClient();

        $client->request('GET', '/users');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLoginRoute(): void
    {
        $client = static::createClient();

        $client->request('GET', '/login');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testLogoutRoute(): void
    {
        $client = static::createClient();

        $client->request('GET', '/logout');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
