<?php

namespace App\Controller;

use App\Entity\Opportunite;
use App\Form\OpportuniteType;
use App\Repository\OpportuniteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/opportunite")
 */
class OpportuniteController extends AbstractController
{
    /**
     * @Route("/", name="opportunite_index", methods={"GET"})
     */
    public function index(OpportuniteRepository $opportuniteRepository): Response
    {
        return $this->render('admin/opportunite/opportunite.html.twig', [
            'opportunites' => $opportuniteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="opportunite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $opportunite = new Opportunite();
        $form = $this->createForm(OpportuniteType::class, $opportunite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($opportunite);
            $entityManager->flush();

            return $this->redirectToRoute('opportunite_index');
        }

        return $this->render('opportunite/new.html.twig', [
            'opportunite' => $opportunite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opportunite_show", methods={"GET"})
     */
    public function show(Opportunite $opportunite): Response
    {
        return $this->render('opportunite/show.html.twig', [
            'opportunite' => $opportunite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="opportunite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Opportunite $opportunite): Response
    {
        $form = $this->createForm(OpportuniteType::class, $opportunite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('opportunite_index');
        }

        return $this->render('opportunite/edit.html.twig', [
            'opportunite' => $opportunite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="opportunite_delete", methods={"POST"})
     */
    public function delete(Request $request, Opportunite $opportunite): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opportunite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($opportunite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('opportunite_index');
    }
}
