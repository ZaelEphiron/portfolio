<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ContactControllerTest extends WebTestCase
{
    public function testContactPageDisplaysForm(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');
        self::assertSelectorTextContains('h1', 'Contact');

        self::assertSelectorTextContains('p.lead', 'Un projet, un besoin ou une question ?');
        self::assertSelectorTextContains('button[type="submit"]', 'Envoyer le message');

        self::assertSelectorExists('form');
        self::assertSelectorExists('input[name*="name"]');
        self::assertSelectorExists('input[name*="email"]');
        self::assertSelectorExists('input[name*="subject"]');
        self::assertSelectorExists('textarea');

        self::assertSelectorTextContains('button[type="submit"]', 'Envoyer le message');
    }
}