<?php

namespace App\Controller;

use App\Entity\Yass;
use App\Form\YassType;
use App\Repository\YassRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/yass')]
final class YassController extends AbstractController
{
    #[Route(name: 'app_yass_index', methods: ['GET'])]
    public function index(YassRepository $yassRepository): Response
    {
        return $this->render('yass/index.html.twig', [
            'yasses' => $yassRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_yass_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $yass = new Yass();
        $form = $this->createForm(YassType::class, $yass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($yass);
            $entityManager->flush();

            return $this->redirectToRoute('app_yass_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('yass/new.html.twig', [
            'yass' => $yass,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_yass_show', methods: ['GET'])]
    public function show(Yass $yass): Response
    {
        return $this->render('yass/show.html.twig', [
            'yass' => $yass,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_yass_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Yass $yass, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(YassType::class, $yass);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_yass_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('yass/edit.html.twig', [
            'yass' => $yass,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_yass_delete', methods: ['POST'])]
    public function delete(Request $request, Yass $yass, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$yass->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($yass);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_yass_index', [], Response::HTTP_SEE_OTHER);
    }
}
