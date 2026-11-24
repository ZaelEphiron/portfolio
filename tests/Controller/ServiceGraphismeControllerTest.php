<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceGraphismeControllerTest extends WebTestCase
{
    public function testGraphismePageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/graphisme-communication');

        self::assertResponseIsSuccessful();

        // Titre principal
        self::assertSelectorTextContains('h1', 'Donnez une identité');
        self::assertSelectorTextContains('h1', 'à vos idées.');

        // Présentation générale
        self::assertSelectorTextContains(
            'body',
            'supports graphiques cohérents et soignés'
        );

        // Identité visuelle
        self::assertSelectorTextContains('body', 'Identité visuelle');
        self::assertSelectorTextContains('body', 'Création de logos');
        self::assertSelectorTextContains(
            'body',
            'Choix des couleurs et des typographies'
        );
        self::assertSelectorTextContains(
            'body',
            'Déclinaisons graphiques adaptées aux supports'
        );

        // Supports de communication
        self::assertSelectorTextContains(
            'body',
            'Supports de communication'
        );
        self::assertSelectorTextContains('body', 'Flyers et affiches');
        self::assertSelectorTextContains('body', 'Cartes de visite');
        self::assertSelectorTextContains(
            'body',
            'Brochures et documents de présentation'
        );

        // Communication numérique
        self::assertSelectorTextContains(
            'body',
            'Communication numérique'
        );
        self::assertSelectorTextContains(
            'body',
            'Visuels pour les réseaux sociaux'
        );
        self::assertSelectorTextContains(
            'body',
            'Bannières et illustrations numériques'
        );

        // Appels à l'action
        self::assertSelectorTextContains(
            'body',
            'Construisons votre identité visuelle'
        );
        self::assertSelectorTextContains('body', 'Décrire mon projet');
        self::assertSelectorTextContains('body', 'Demander un devis');

        // Liens vers la page Contact
        self::assertSelectorExists('a[href*="/contact"]');
    }
}