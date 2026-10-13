<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PrivacyControllerTest extends WebTestCase
{
    public function testPrivacyPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/privacy');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}
