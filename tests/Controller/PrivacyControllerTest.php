<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class PrivacyControllerTest extends WebTestCase
{
    public function testPrivacyPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/privacy');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre et introduction
        self::assertSelectorTextContains('h1', 'Politique de confidentialité');
        self::assertSelectorTextContains('body', 'Protection et traitement de vos données personnelles');

        // Responsable du traitement
        self::assertSelectorTextContains('body', 'Responsable du traitement');
        self::assertSelectorTextContains('body', "l'éditeur du site");

        // Données collectées
        self::assertSelectorTextContains('body', 'Données collectées');
        self::assertSelectorTextContains('body', 'Votre nom');
        self::assertSelectorTextContains('body', 'Votre adresse e-mail');
        self::assertSelectorTextContains('body', 'L\'objet de votre demande');
        self::assertSelectorTextContains('body', 'Le contenu de votre message');

        // Base légale et finalité
        self::assertSelectorTextContains('body', 'Base légale du traitement');
        self::assertSelectorTextContains('body', 'intérêt légitime');
        self::assertSelectorTextContains('body', 'Finalité du traitement');
        self::assertSelectorTextContains('body', 'traiter votre demande');

        // Conservation et destinataires
        self::assertSelectorTextContains('body', 'Durée de conservation');
        self::assertSelectorTextContains('body', 'trois ans');
        self::assertSelectorTextContains('body', 'Destinataires des données');
        self::assertSelectorTextContains('body', 'prestataires techniques');

        // Droits des personnes et CNIL
        self::assertSelectorTextContains('body', 'Vos droits');
        self::assertSelectorTextContains('body', 'droit d\'accès');
        self::assertSelectorExists('a[href="https://www.cnil.fr/fr/plaintes"]');

        // Contact et cookies
        self::assertSelectorExists('a[href="/contact"]:not(.nav-link)');
        self::assertSelectorTextContains('a[href="/contact"]:not(.nav-link)', 'formulaire de contact');
        self::assertSelectorTextContains('body', 'Cookies');
        self::assertSelectorTextContains('body', 'aucun outil de mesure');
    }
}