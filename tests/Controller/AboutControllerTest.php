<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class AboutControllerTest extends WebTestCase
{
    public function testAboutPageDisplaysMainContent(): void
    {
        $client = static::createClient();
        $client->request('GET', '/about');

        self::assertResponseIsSuccessful();
        self::assertSelectorExists('body');

        // Introduction
        self::assertSelectorTextContains('h1', 'Un profil à la croisée du web,');
        self::assertSelectorTextContains('body', "de l'informatique et de la sécurité.");
        self::assertSelectorTextContains('body', 'Eyseal est né de la volonté de proposer des solutions');

        // Parcours et approche
        self::assertSelectorTextContains('body', 'Mon parcours');
        self::assertSelectorTextContains('body', 'Master 2 en sécurité des systèmes');
        self::assertSelectorTextContains('body', 'Mon approche');
        self::assertSelectorTextContains('body', 'solutions simples, maintenables et adaptées');

        // Domaines de compétences
        self::assertSelectorTextContains('body', 'Mes compétences');
        self::assertSelectorTextContains('body', 'Développement');
        self::assertSelectorTextContains('body', 'Systèmes & réseaux');
        self::assertSelectorTextContains('body', 'Cybersécurité');
        self::assertSelectorTextContains('body', 'DevOps & DevSecOps');
        self::assertSelectorTextContains('body', 'SEO & accessibilité');
        self::assertSelectorTextContains('body', 'Graphisme');

        // Positionnement et contact
        self::assertSelectorTextContains('body', 'Une approche orientée solutions');
        self::assertSelectorExists('a[href="/contact"]');
        self::assertSelectorExists('a.btn[href="/contact"]');
        self::assertSelectorTextContains('a.btn[href="/contact"]', 'Parlons de votre projet');
    }
}