<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Paises;


class MainController extends AbstractController
{
    #[Route('/test', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main\test.html.twig', [
            'controller_name' => 'MainController',
            'lista' => ['Produto 1','Produto 2','Produto 3','Produto 4','Produto 5'],
        ]);
    }

    #[Route('/paises', name: 'app_main', methods:['GET','POST'])]
    public function connection(EntityManagerInterface $entityManager){

        $paises = $entityManager->getRepository(Paises::class)->findAll();
        
        return $this->render('main\listapaises.html.twig', [
           'paises'=>$paises,
        ]);
    }
}
