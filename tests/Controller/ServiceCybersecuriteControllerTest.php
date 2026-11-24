<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceCybersecuriteControllerTest extends WebTestCase
{
    public function testCybersecuritePageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/cybersecurite');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre principal
        self::assertSelectorTextContains('h1', 'Protégez vos systèmes,');
        self::assertSelectorTextContains('h1', 'maîtrisez vos risques.');

        // Présentation
        self::assertSelectorTextContains(
            'body',
            'des prestations adaptées aux particuliers'
        );

        // Domaines d'intervention
        self::assertSelectorTextContains(
            'body',
            "Tests d'intrusion et analyse de vulnérabilités"
        );
        self::assertSelectorTextContains(
            'body',
            'Analyse forensic et investigation numérique'
        );
        self::assertSelectorTextContains(
            'body',
            'Sécurisation des systèmes et Active Directory'
        );
        self::assertSelectorTextContains('body', 'Réseaux et pare-feu');
        self::assertSelectorTextContains(
            'body',
            'Prévention et accompagnement'
        );

        // Tarifs
        self::assertSelectorTextContains('body', 'Diagnostic de sécurité');
        self::assertSelectorTextContains('body', "Sécurisation d'un poste");
        self::assertSelectorTextContains('body', '60 € / heure');
        self::assertSelectorTextContains('body', 'Missions spécialisées');

        // Précautions de sécurité
        self::assertSelectorTextContains('body', 'une autorisation écrite');

        // Lien vers la page Contact
        self::assertSelectorExists('a[href*="/contact"]');
    }
}