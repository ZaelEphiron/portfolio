<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceWebWordPressEssentielControllerTest extends WebTestCase
{
    public function testWordPressEssentielPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/developpement-web/wordpress/essentiel');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre et présentation
        self::assertSelectorTextContains('h1', 'Votre site WordPress,');
        self::assertSelectorTextContains('h1', 'simplement et efficacement.');
        self::assertSelectorTextContains('body', 'Offre Essentielle CMS');
        self::assertSelectorTextContains('body', 'gérer facilement vos contenus');

        // Accès aux prestations
        self::assertSelectorExists('a[href="#prestations"]');
        self::assertSelectorTextContains('body', 'L\'essentiel pour votre site WordPress');

        // Les six prestations incluses
        self::assertSelectorTextContains('body', 'Site vitrine WordPress');
        self::assertSelectorTextContains('body', 'Thème personnalisé');
        self::assertSelectorTextContains('body', 'Design responsive');
        self::assertSelectorTextContains('body', 'Fonctionnalités essentielles');
        self::assertSelectorTextContains('body', 'SEO et sécurité de base');
        self::assertSelectorTextContains('body', 'Prise en main du CMS');

        // Tarif et périmètre de l'offre
        self::assertSelectorTextContains('body', 'Tarif sur devis');
        self::assertSelectorTextContains('body', 'Selon le périmètre et les besoins de votre projet');
        self::assertSelectorTextContains('body', 'Site vitrine de 1 à 5 pages');
        self::assertSelectorTextContains('body', 'Installation et configuration de WordPress');
        self::assertSelectorTextContains('body', '500 mots au total');
        self::assertSelectorTextContains('body', 'Deux séries de corrections incluses');

        // Prestations supplémentaires
        self::assertSelectorTextContains('body', 'À prévoir en supplément');
        self::assertSelectorTextContains('body', 'licences et extensions payantes');
        self::assertSelectorTextContains('body', 'devis complémentaire avant intervention');

        // Demande de devis
        self::assertSelectorExists('a.btn[href*="/contact"]');
        self::assertSelectorTextContains('a.btn[href*="/contact"]', 'Demander un devis');
    }
}