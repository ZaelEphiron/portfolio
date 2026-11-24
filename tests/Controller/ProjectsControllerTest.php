<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class ProjectsControllerTest extends WebTestCase
{
    public function testProjectsPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/projects');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Titre et introduction
        self::assertSelectorTextContains('h1', 'Mes réalisations');
        self::assertSelectorTextContains('body', 'Découvrez quelques projets web, techniques et DevSecOps');

        // Projet DevSecOps
        self::assertSelectorTextContains('body', 'Portfolio DevSecOps');
        self::assertSelectorTextContains('body', 'chaîne CI/CD avec GitHub Actions');
        self::assertSelectorTextContains('body', 'analyse SAST avec Semgrep');
        self::assertSelectorTextContains('body', 'Trivy');
        self::assertSelectorTextContains('body', 'GitHub Actions');
        self::assertSelectorTextContains('body', 'Docker');
        self::assertSelectorTextContains('body', 'CI/CD');

        // Projet Symfony
        self::assertSelectorTextContains('body', 'Site vitrine pour une agence digitale');
        self::assertSelectorTextContains('body', 'projet réalisé en équipe');
        self::assertSelectorTextContains('body', 'Symfony');
        self::assertSelectorTextContains('body', 'PHP');
        self::assertSelectorTextContains('body', 'MySQL');
        self::assertSelectorTextContains('body', 'Bootstrap');

        // Appel à l'action
        self::assertSelectorTextContains('body', 'Un projet en cours ?');
        self::assertSelectorTextContains('body', 'Découvrez comment Eyseal peut vous accompagner');
        self::assertSelectorExists('a.btn[href="/contact"]');
        self::assertSelectorTextContains('a.btn[href="/contact"]', 'Me contacter');
    }
}