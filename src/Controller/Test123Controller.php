<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class Test123Controller extends AbstractController
{
    #[Route('/test123', name: 'app_test123')]
    public function index(): Response
    {
        return $this->render('test123/index.html.twig', [
            'controller_name' => 'Test123Controller',
        ]);
    }
}
