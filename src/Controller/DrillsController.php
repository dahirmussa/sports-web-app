<?php

namespace App\Controller;

use App\Entity\Drills;
use App\Form\DrillsType;
use App\Repository\DrillsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/drills")
 */
class DrillsController extends AbstractController
{
    /**
     * @Route("/", name="drills_index", methods={"GET"})
     */
    public function index(DrillsRepository $drillsRepository): Response
    {
        return $this->render('drills/index.html.twig', [
            'drills' => $drillsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="drills_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $drill = new Drills();
        $form = $this->createForm(DrillsType::class, $drill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($drill);
            $entityManager->flush();

            return $this->redirectToRoute('drills_index');
        }

        return $this->render('drills/new.html.twig', [
            'drill' => $drill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drills_show", methods={"GET"})
     */
    public function show(Drills $drill): Response
    {
        return $this->render('drills/show.html.twig', [
            'drill' => $drill,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="drills_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Drills $drill): Response
    {
        $form = $this->createForm(DrillsType::class, $drill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('drills_index');
        }

        return $this->render('drills/edit.html.twig', [
            'drill' => $drill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drills_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Drills $drill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$drill->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($drill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('drills_index');
    }

    /**
     * @Route("/type/{type}", name="drills_search", methods={"GET"})
     */
    public function search($type): Response
    {

        $DrillsRepository = $this->getDoctrine()->getRepository('App:Drills');
        $Drills =  $DrillsRepository->findByType($type);

        $template = 'drills/index.html.twig';
        $args = [
            'drills' => $Drills,
            'type' => $type
        ];

        return $this->render($template, $args);
    }
    /**
     * @Route("/searchType", name="search_type", methods={"POST"})
     */
    public function searchType(Request $request): Response
    {
        $type = $request->request->get('type');

        if(empty($type)){
            return $this->redirectToRoute('drills_index');
        }

        return $this->redirectToRoute('drills_search', ['type' => $type]);
    }

}
