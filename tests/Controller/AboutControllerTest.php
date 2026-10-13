<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class AboutControllerTest extends WebTestCase
{
    public function testAboutPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/about');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}