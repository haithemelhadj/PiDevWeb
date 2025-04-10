<?php

namespace App\Controller;

use App\Entity\ParticipantEvenement;
use App\Form\ParticipantEvenementType;
use App\Repository\ParticipantEvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/participant/evenement')]
final class ParticipantEvenementController extends AbstractController
{
    #[Route(name: 'app_participant_evenement_index', methods: ['GET'])]
    public function index(ParticipantEvenementRepository $participantEvenementRepository): Response
    {
        return $this->render('participant_evenement/index.html.twig', [
            'participant_evenements' => $participantEvenementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_participant_evenement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $participantEvenement = new ParticipantEvenement();
        $form = $this->createForm(ParticipantEvenementType::class, $participantEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($participantEvenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_participant_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('participant_evenement/new.html.twig', [
            'participant_evenement' => $participantEvenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_participant_evenement_show', methods: ['GET'])]
    public function show(ParticipantEvenement $participantEvenement): Response
    {
        return $this->render('participant_evenement/show.html.twig', [
            'participant_evenement' => $participantEvenement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_participant_evenement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ParticipantEvenement $participantEvenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ParticipantEvenementType::class, $participantEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_participant_evenement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('participant_evenement/edit.html.twig', [
            'participant_evenement' => $participantEvenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_participant_evenement_delete', methods: ['POST'])]
    public function delete(Request $request, ParticipantEvenement $participantEvenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$participantEvenement->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($participantEvenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_participant_evenement_index', [], Response::HTTP_SEE_OTHER);
    }
}
