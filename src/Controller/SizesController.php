<?php

namespace App\Controller;

use App\Entity\Sizes;
use App\Form\SizesType;
use App\Repository\SizesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sizes")
 */
class SizesController extends AbstractController
{
    /**
     * @Route("/", name="sizes_index", methods={"GET"})
     */
    public function index(SizesRepository $sizesRepository): Response
    {
        return $this->render('sizes/index.html.twig', [
            'sizes' => $sizesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sizes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $size = new Sizes();
        $form = $this->createForm(SizesType::class, $size);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($size);
            $entityManager->flush();

            return $this->redirectToRoute('sizes_index');
        }

        return $this->render('sizes/new.html.twig', [
            'size' => $size,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sizes_show", methods={"GET"})
     */
    public function show(Sizes $size): Response
    {
        return $this->render('sizes/show.html.twig', [
            'size' => $size,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sizes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sizes $size): Response
    {
        $form = $this->createForm(SizesType::class, $size);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sizes_index');
        }

        return $this->render('sizes/edit.html.twig', [
            'size' => $size,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sizes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sizes $size): Response
    {
        if ($this->isCsrfTokenValid('delete'.$size->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($size);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sizes_index');
    }
}
