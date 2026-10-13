<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
        ]);
    }

    #[Route('/services/developpement-web', name: 'app_service_web')]
    public function web(): Response
    {
        return $this->render('services/web.html.twig');
    }

    
    #[Route('/services/developpement-web/essentiel', name: 'app_service_web_essentiel')]
    public function webEssentiel(): Response
    {
        return $this->render('services/web/symfony/essentiel.html.twig');
    }
    
    #[Route('/services/developpement-web/wordpress/essentiel', name: 'app_service_web_wordpress_essentiel')]
    public function webWordpressEssentiel(): Response
    {
        return $this->render('services/web/wordpress/essentiel.html.twig');
    }

    #[Route('/services/maintenance-informatique/essentiel', name: 'app_service_maintenance_essentiel')]
    public function maintenanceEssentiel(): Response
    {
        return $this->render('services/maintenance/essentiel.html.twig');
    }

    #[Route('/services/cybersecurite', name: 'app_service_cybersecurite')]
    public function cybersecurite(): Response
    {
        return $this->render('services/cybersecurite/index.html.twig');
    }
    
    #[Route('/services/seo-accessibilite', name: 'app_service_seo_accessibilite')]
    public function seoAccessibilite(): Response
    {
        return $this->render('services/seo-accessibilite/index.html.twig');
    }
    
    #[Route('/services/graphisme-communication', name: 'app_service_graphisme')]
    public function graphisme(): Response
    {
        return $this->render('services/graphisme/index.html.twig');
    }

}