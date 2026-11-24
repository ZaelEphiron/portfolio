<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServicesControllerTest extends WebTestCase
{
    public function testServicesPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre et introduction
        self::assertSelectorTextContains('h1', 'Des services');
        self::assertSelectorTextContains('body', 'pensés pour avancer.');
        self::assertSelectorTextContains('body', 'Eyseal vous accompagne dans vos projets numériques.');

        // Section des services
        self::assertSelectorTextContains('body', 'Mes services');

        // Catégories proposées
        self::assertSelectorTextContains('body', 'Développement web');
        self::assertSelectorTextContains('body', 'WordPress');
        self::assertSelectorTextContains('body', 'Maintenance informatique');
        self::assertSelectorTextContains('body', 'Cybersécurité');
        self::assertSelectorTextContains('body', 'SEO & accessibilité');
        self::assertSelectorTextContains('body', 'Graphisme');

        // Liens vers les pages détaillées
        self::assertSelectorExists('a[href="/services/developpement-web/essentiel"]');
        self::assertSelectorExists('a[href="/services/developpement-web/wordpress/essentiel"]');
        self::assertSelectorExists('a[href="/services/maintenance-informatique/essentiel"]');
        self::assertSelectorExists('a[href="/services/cybersecurite"]');
        self::assertSelectorExists('a[href="/services/seo-accessibilite"]');
        self::assertSelectorExists('a[href="/services/graphisme-communication"]');
    }
}