<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ProjectsControllerTest extends WebTestCase
{
    public function testProjectsPageReturnsSuccessfulResponse(): void
    {
        $client = static::createClient();
        $client->request('GET', '/projects');

        self::assertResponseIsSuccessful();
    }
}