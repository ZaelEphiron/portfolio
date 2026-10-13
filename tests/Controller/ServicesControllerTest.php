<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServicesControllerTest extends WebTestCase
{
    public function testServicesPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}
