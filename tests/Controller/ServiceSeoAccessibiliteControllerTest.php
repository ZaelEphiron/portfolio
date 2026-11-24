<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceSeoAccessibiliteControllerTest extends WebTestCase
{
    public function testSeoAccessibilitePageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/seo-accessibilite');

        self::assertResponseIsSuccessful();

        // Titre principal
        self::assertSelectorTextContains('h1', 'Un site plus visible,');
        self::assertSelectorTextContains('h1', 'accessible à tous.');

        // Présentation générale
        self::assertSelectorTextContains(
            'body',
            "référencement naturel et de l'accessibilité"
        );

        // Prestations SEO
        self::assertSelectorTextContains(
            'body',
            'Audit de référencement naturel'
        );
        self::assertSelectorTextContains(
            'body',
            'Analyse de la structure des pages et des titres'
        );
        self::assertSelectorTextContains(
            'body',
            'Vérification des métadonnées et des liens'
        );
        self::assertSelectorTextContains(
            'body',
            "Recommandations d'amélioration priorisées"
        );

        // Prestations accessibilité numérique
        self::assertSelectorTextContains(
            'body',
            "Audit d'accessibilité numérique"
        );
        self::assertSelectorTextContains(
            'body',
            'Vérification des contrastes et de la lisibilité'
        );
        self::assertSelectorTextContains(
            'body',
            'Examen des textes alternatifs des images'
        );
        self::assertSelectorTextContains(
            'body',
            'Premières vérifications de navigation au clavier'
        );
        self::assertSelectorTextContains(
            'body',
            'Recommandations inspirées des critères du RGAA'
        );

        // Appels à l'action
        self::assertSelectorTextContains('body', 'Améliorons votre site web');
        self::assertSelectorTextContains('body', 'Décrire mon besoin');
        self::assertSelectorTextContains('body', 'Demander un devis');

        // Liens vers la page Contact
        self::assertSelectorExists('a[href*="/contact"]');
    }
}