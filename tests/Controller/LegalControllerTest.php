<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class LegalControllerTest extends WebTestCase
{
    public function testLegalPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/legal');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre et introduction
        self::assertSelectorTextContains('h1', 'Mentions légales');
        self::assertSelectorTextContains('body', 'Informations légales relatives au site Eyseal');

        // Éditeur du site
        self::assertSelectorTextContains('body', 'Éditeur du site');
        self::assertSelectorTextContains('body', 'Site professionnel et portfolio de Michaël Chassaing');
        self::assertSelectorExists('a[href="mailto:contact@eyseal.fr"]');

        // Hébergement
        self::assertSelectorTextContains('body', 'Hébergement');
        self::assertSelectorTextContains('body', 'À compléter');

        // Propriété intellectuelle
        self::assertSelectorTextContains('body', 'Propriété intellectuelle');
        self::assertSelectorTextContains('body', 'textes, éléments graphiques, logos, images');

        // Responsabilité
        self::assertSelectorTextContains('body', 'Responsabilité');
        self::assertSelectorTextContains('body', "l'exactitude, l'exhaustivité ou");

        // Contact
        self::assertSelectorTextContains('body', 'Pour toute question concernant le site ou son contenu');
        self::assertSelectorTextContains('a[href="/contact"]:not(.nav-link)', 'formulaire de contact');
    }
}