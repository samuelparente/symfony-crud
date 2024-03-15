<?php

namespace App\Controller;

use App\Entity\Produtos;
use App\Form\ProdutosType;
use App\Repository\ProdutosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/produtos')]
class ProdutosController extends AbstractController
{
    #[Route('/', name: 'app_produtos_index', methods: ['GET'])]
    public function index(ProdutosRepository $produtosRepository): Response
    {
        return $this->render('produtos/index.html.twig', [
            'produtos' => $produtosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_produtos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produto = new Produtos();
        $form = $this->createForm(ProdutosType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($produto);
            $entityManager->flush();

            return $this->redirectToRoute('app_produtos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produtos/new.html.twig', [
            'produto' => $produto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produtos_show', methods: ['GET'])]
    public function show(Produtos $produto): Response
    {
        return $this->render('produtos/show.html.twig', [
            'produto' => $produto,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_produtos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produtos $produto, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProdutosType::class, $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_produtos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('produtos/edit.html.twig', [
            'produto' => $produto,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_produtos_delete', methods: ['POST'])]
    public function delete(Request $request, Produtos $produto, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produto->getId(), $request->request->get('_token'))) {
            $entityManager->remove($produto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_produtos_index', [], Response::HTTP_SEE_OTHER);
    }
}
