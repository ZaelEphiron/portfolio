<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceSeoAccessibiliteControllerTest extends WebTestCase
{
    public function testSeoAccessibilitePageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/seo-accessibilite');

        self::assertResponseIsSuccessful();
    }
}
