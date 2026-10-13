<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class LegalControllerTest extends WebTestCase
{
    public function testLegalPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/legal');

        self::assertResponseIsSuccessful();
    }
}