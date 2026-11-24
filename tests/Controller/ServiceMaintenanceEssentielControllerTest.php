<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ServiceMaintenanceEssentielControllerTest extends WebTestCase
{
    public function testMaintenancePageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/services/maintenance-informatique/essentiel');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        self::assertSelectorTextContains('h1', 'Un informatique plus fiable,');
        self::assertSelectorTextContains('h1', 'au quotidien.');

        self::assertSelectorTextContains(
            'body',
            'des prestations adaptées aux particuliers et aux professionnels'
        );

        self::assertSelectorTextContains('body', 'Diagnostic et dépannage');
        self::assertSelectorTextContains('body', 'Installation et configuration');
        self::assertSelectorTextContains('body', 'Mises à jour');
        self::assertSelectorTextContains('body', 'Optimisation logicielle');
        self::assertSelectorTextContains('body', 'Sécurité de base');
        self::assertSelectorTextContains('body', 'Sauvegarde et conseils');

        self::assertSelectorTextContains('body', 'Intervention ponctuelle');
        self::assertSelectorTextContains('body', 'À partir de 40 €/h');
        self::assertSelectorTextContains('body', 'Forfait Entretien');
        self::assertSelectorTextContains('body', '59 € / ordinateur');
        self::assertSelectorTextContains('body', 'Forfait Optimisation');
        self::assertSelectorTextContains('body', '89 € / ordinateur');
        self::assertSelectorTextContains('body', 'Maintenance professionnelle');
        self::assertSelectorTextContains('body', 'Sur devis');

        self::assertSelectorTextContains(
            'body',
            'Une intervention adaptée à votre situation'
        );
        self::assertSelectorTextContains('body', 'Les réparations matérielles');

        self::assertSelectorExists('a[href*="/contact"]');
    }
}