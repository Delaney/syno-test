<?php

namespace App\Controller;

use App\Entity\Panelist;
use App\Form\PanelistType;
use App\Repository\PanelistRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/panelist')]
class PanelistController extends AbstractController
{
    #[Route('/', name: 'app_panelist_index', methods: ['GET'])]
    public function index(PanelistRepository $panelistRepository): Response
    {
        return $this->render('panelist/index.html.twig', [
            'panelists' => $panelistRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_panelist_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $panelist = new Panelist();
        $form = $this->createForm(PanelistType::class, $panelist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($panelist);
            $entityManager->flush();

            return $this->redirectToRoute('app_panelist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panelist/new.html.twig', [
            'panelist' => $panelist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_panelist_show', methods: ['GET'])]
    public function show(Panelist $panelist): Response
    {
        return $this->render('panelist/show.html.twig', [
            'panelist' => $panelist,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_panelist_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Panelist $panelist, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PanelistType::class, $panelist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_panelist_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('panelist/edit.html.twig', [
            'panelist' => $panelist,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_panelist_delete', methods: ['POST'])]
    public function delete(Request $request, Panelist $panelist, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid(('delete'.$panelist->getId()), strval($request->request->get('_token')))) {
            $entityManager->remove($panelist);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_panelist_index', [], Response::HTTP_SEE_OTHER);
    }
}
