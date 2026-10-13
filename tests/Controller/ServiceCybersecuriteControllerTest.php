<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceCybersecuriteControllerTest extends WebTestCase
{
    public function testCybersecuritePageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/cybersecurite');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}
