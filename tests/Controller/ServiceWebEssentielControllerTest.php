<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceWebEssentielControllerTest extends WebTestCase
{
    public function testWebEssentielPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/developpement-web/essentiel');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre et présentation
        self::assertSelectorTextContains('h1', 'Une présence professionnelle');
        self::assertSelectorTextContains('h1', 'en ligne, simplement.');
        self::assertSelectorTextContains('body', 'Offre Essentielle');
        self::assertSelectorTextContains('body', 'site vitrine moderne, clair et efficace');

        // Accès aux prestations
        self::assertSelectorExists('a[href="#prestations"]');
        self::assertSelectorTextContains('body', 'L\'essentiel pour lancer votre présence en ligne');

        // Les six prestations incluses
        self::assertSelectorTextContains('body', 'Site vitrine');
        self::assertSelectorTextContains('body', 'Design responsive');
        self::assertSelectorTextContains('body', 'Contact simplifié');
        self::assertSelectorTextContains('body', 'Bases du référencement');
        self::assertSelectorTextContains('body', 'Sécurité de base');
        self::assertSelectorTextContains('body', 'Mise en ligne');

        // Tarif et périmètre de l'offre
        self::assertSelectorTextContains('body', '390 €');
        self::assertSelectorTextContains('body', 'Tarif indicatif, à confirmer selon votre projet');
        self::assertSelectorTextContains('body', 'Site vitrine de 1 à 3 pages');
        self::assertSelectorTextContains('body', '500 mots au total');
        self::assertSelectorTextContains('body', 'Deux séries de corrections incluses');

        // Prestations supplémentaires
        self::assertSelectorTextContains('body', 'À prévoir en supplément');
        self::assertSelectorTextContains('body', 'Le nom de domaine, l\'hébergement');

        // Demande de devis
        self::assertSelectorExists('a.btn[href*="/contact"]');
        self::assertSelectorTextContains('a.btn[href*="/contact"]', 'Demander un devis');
    }
}