<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceGraphismeControllerTest extends WebTestCase
{
    public function testGraphismePageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/graphisme-communication');

        self::assertResponseIsSuccessful();
    }
}