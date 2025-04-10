<?php

namespace App\Controller;

use App\Entity\Calendrier;
use App\Form\CalendrierType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/calendrier')]
final class CalendrierController extends AbstractController
{
    #[Route(name: 'app_calendrier_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $calendriers = $entityManager
            ->getRepository(Calendrier::class)
            ->findAll();

        return $this->render('calendrier/index.html.twig', [
            'calendriers' => $calendriers,
        ]);
    }

    #[Route('/new', name: 'app_calendrier_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $calendrier = new Calendrier();
        $form = $this->createForm(CalendrierType::class, $calendrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($calendrier);
            $entityManager->flush();

            return $this->redirectToRoute('app_calendrier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calendrier/new.html.twig', [
            'calendrier' => $calendrier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calendrier_show', methods: ['GET'])]
    public function show(Calendrier $calendrier): Response
    {
        return $this->render('calendrier/show.html.twig', [
            'calendrier' => $calendrier,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_calendrier_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Calendrier $calendrier, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CalendrierType::class, $calendrier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_calendrier_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('calendrier/edit.html.twig', [
            'calendrier' => $calendrier,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_calendrier_delete', methods: ['POST'])]
    public function delete(Request $request, Calendrier $calendrier, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendrier->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($calendrier);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_calendrier_index', [], Response::HTTP_SEE_OTHER);
    }
}
