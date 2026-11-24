<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class HomeControllerTest extends WebTestCase
{
    public function testHomePageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre principal
        self::assertSelectorTextContains('h1', 'Vos projets web et informatiques');
        self::assertSelectorTextContains('h1', 'avec une approche sécurisée.');

        // Présentation
        self::assertSelectorTextContains('p.hero-text', 'Eyseal accompagne les professionnels');

        // Sections principales
        self::assertSelectorTextContains('body', 'Un accompagnement numérique polyvalent');
        self::assertSelectorTextContains('body', 'Mes services');
        self::assertSelectorTextContains('body', 'Des projets concrets');
        self::assertSelectorTextContains('body', "À propos d'Eyseal");
        self::assertSelectorTextContains('body', 'Un projet ? Parlons-en.');
       
        // Services proposés
        self::assertSelectorTextContains('body', 'Développement web');
        self::assertSelectorTextContains('body', 'WordPress');
        self::assertSelectorTextContains('body', 'Informatique');
        self::assertSelectorTextContains('body', 'Cybersécurité');
        self::assertSelectorTextContains('body', 'SEO & accessibilité');
        self::assertSelectorTextContains('body', 'Identité visuelle');

        // Liens vers les pages importantes
        self::assertSelectorExists('a[href="/contact"]');
        self::assertSelectorExists('a[href="/services"]');
        self::assertSelectorExists('a[href="/projects"]');
        self::assertSelectorExists('a[href="/about"]');
    }
}