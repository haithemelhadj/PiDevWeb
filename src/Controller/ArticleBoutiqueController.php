<?php

namespace App\Controller;

use App\Entity\ArticleBoutique;
use App\Form\ArticleBoutiqueType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/article/boutique')]
final class ArticleBoutiqueController extends AbstractController
{
    #[Route(name: 'app_article_boutique_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $articleBoutiques = $entityManager
            ->getRepository(ArticleBoutique::class)
            ->findAll();

        return $this->render('article_boutique/index.html.twig', [
            'article_boutiques' => $articleBoutiques,
        ]);
    }

    #[Route('/new', name: 'app_article_boutique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $articleBoutique = new ArticleBoutique();
        $form = $this->createForm(ArticleBoutiqueType::class, $articleBoutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($articleBoutique);
            $entityManager->flush();

            return $this->redirectToRoute('app_article_boutique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article_boutique/new.html.twig', [
            'article_boutique' => $articleBoutique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_boutique_show', methods: ['GET'])]
    public function show(ArticleBoutique $articleBoutique): Response
    {
        return $this->render('article_boutique/show.html.twig', [
            'article_boutique' => $articleBoutique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_article_boutique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ArticleBoutique $articleBoutique, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ArticleBoutiqueType::class, $articleBoutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_article_boutique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('article_boutique/edit.html.twig', [
            'article_boutique' => $articleBoutique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_article_boutique_delete', methods: ['POST'])]
    public function delete(Request $request, ArticleBoutique $articleBoutique, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$articleBoutique->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($articleBoutique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_article_boutique_index', [], Response::HTTP_SEE_OTHER);
    }
}
