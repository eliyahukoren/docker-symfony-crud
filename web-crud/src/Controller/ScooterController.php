<?php

namespace App\Controller;

use App\Entity\Scooter;
use App\Form\ScooterType;
use App\Repository\ScooterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/scooter")
 */
class ScooterController extends AbstractController
{
    /**
     * @Route("/", name="scooter_index", methods={"GET"})
     */
    public function index(ScooterRepository $scooterRepository): Response
    {
        return $this->render('scooter/index.html.twig', [
            'scooters' => $scooterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="scooter_new", methods={"GET", "POST"})
     */
    public function new(Request $request, ScooterRepository $scooterRepository): Response
    {
        $scooter = new Scooter();
        $form = $this->createForm(ScooterType::class, $scooter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scooterRepository->add($scooter, true);

            return $this->redirectToRoute('scooter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('scooter/new.html.twig', [
            'scooter' => $scooter,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="scooter_show", methods={"GET"})
     */
    public function show(Scooter $scooter): Response
    {
        return $this->render('scooter/show.html.twig', [
            'scooter' => $scooter,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="scooter_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Scooter $scooter, ScooterRepository $scooterRepository): Response
    {
        $form = $this->createForm(ScooterType::class, $scooter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scooterRepository->add($scooter, true);

            return $this->redirectToRoute('scooter_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('scooter/edit.html.twig', [
            'scooter' => $scooter,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="scooter_delete", methods={"POST"})
     */
    public function delete(Request $request, Scooter $scooter, ScooterRepository $scooterRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scooter->getId(), $request->request->get('_token'))) {
            $scooterRepository->remove($scooter, true);
        }

        return $this->redirectToRoute('scooter_index', [], Response::HTTP_SEE_OTHER);
    }
}
