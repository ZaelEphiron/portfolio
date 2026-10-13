<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceWebWordPressEssentielControllerTest extends WebTestCase
{
    public function testWordPressEssentielPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/developpement-web/wordpress/essentiel');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}
