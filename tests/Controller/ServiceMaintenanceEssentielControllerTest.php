<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceMaintenanceEssentielControllerTest extends WebTestCase
{
    public function testMaintenanceEssentielPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/maintenance-informatique/essentiel');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorExists('h1');
    }
}
