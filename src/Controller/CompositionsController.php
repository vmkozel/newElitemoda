<?php

namespace App\Controller;

use App\Entity\Compositions;
use App\Form\CompositionsType;
use App\Repository\CompositionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/compositions")
 */
class CompositionsController extends AbstractController
{
    /**
     * @Route("/", name="compositions_index", methods={"GET"})
     */
    public function index(CompositionsRepository $compositionsRepository): Response
    {
        return $this->render('compositions/index.html.twig', [
            'compositions' => $compositionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="compositions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $composition = new Compositions();
        $form = $this->createForm(CompositionsType::class, $composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($composition);
            $entityManager->flush();

            return $this->redirectToRoute('compositions_index');
        }

        return $this->render('compositions/new.html.twig', [
            'composition' => $composition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compositions_show", methods={"GET"})
     */
    public function show(Compositions $composition): Response
    {
        return $this->render('compositions/show.html.twig', [
            'composition' => $composition,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="compositions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Compositions $composition): Response
    {
        $form = $this->createForm(CompositionsType::class, $composition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('compositions_index');
        }

        return $this->render('compositions/edit.html.twig', [
            'composition' => $composition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="compositions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Compositions $composition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$composition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($composition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('compositions_index');
    }
}
