<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceWebEssentielControllerTest extends WebTestCase
{
    public function testWebEssentielPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/developpement-web/essentiel');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}
