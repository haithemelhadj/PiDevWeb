<?php

namespace App\Controller;

use App\Entity\Reponses;
use App\Form\ReponsesType;
use App\Repository\ReponsesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/reponses')]
final class ReponsesController extends AbstractController
{
    #[Route(name: 'app_reponses_index', methods: ['GET'])]
    public function index(ReponsesRepository $reponsesRepository): Response
    {
        return $this->render('reponses/index.html.twig', [
            'reponses' => $reponsesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_reponses_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reponse = new Reponses();
        $form = $this->createForm(ReponsesType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reponse);
            $entityManager->flush();

            return $this->redirectToRoute('app_reponses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reponses/new.html.twig', [
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponses_show', methods: ['GET'])]
    public function show(Reponses $reponse): Response
    {
        return $this->render('reponses/show.html.twig', [
            'reponse' => $reponse,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_reponses_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reponses $reponse, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReponsesType::class, $reponse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_reponses_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('reponses/edit.html.twig', [
            'reponse' => $reponse,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_reponses_delete', methods: ['POST'])]
    public function delete(Request $request, Reponses $reponse, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reponse->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($reponse);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_reponses_index', [], Response::HTTP_SEE_OTHER);
    }
}
