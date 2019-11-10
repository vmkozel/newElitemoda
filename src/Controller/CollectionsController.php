<?php

namespace App\Controller;

use App\Entity\Collections;
use App\Form\CollectionsType;
use App\Repository\CollectionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/collections")
 */
class CollectionsController extends AbstractController
{
    /**
     * @Route("/", name="collections_index", methods={"GET"})
     */
    public function index(CollectionsRepository $collectionsRepository): Response
    {
        return $this->render('collections/index.html.twig', [
            'collections' => $collectionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="collections_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $collection = new Collections();
        $form = $this->createForm(CollectionsType::class, $collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($collection);
            $entityManager->flush();

            return $this->redirectToRoute('collections_index');
        }

        return $this->render('collections/new.html.twig', [
            'collection' => $collection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="collections_show", methods={"GET"})
     */
    public function show(Collections $collection): Response
    {
        return $this->render('collections/show.html.twig', [
            'collection' => $collection,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="collections_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Collections $collection): Response
    {
        $form = $this->createForm(CollectionsType::class, $collection);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('collections_index');
        }

        return $this->render('collections/edit.html.twig', [
            'collection' => $collection,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="collections_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Collections $collection): Response
    {
        if ($this->isCsrfTokenValid('delete'.$collection->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($collection);
            $entityManager->flush();
        }

        return $this->redirectToRoute('collections_index');
    }
}
