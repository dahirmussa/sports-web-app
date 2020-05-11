<?php

namespace App\Controller;

use App\Entity\Drill;
use App\Form\DrillType;
use App\Repository\DrillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/drill")
 *  @IsGranted("ROLE_COACH")
 */
class DrillController extends AbstractController
{
    /**
     * @Route("/", name="drill_index", methods={"GET"})
     */
    public function index(DrillRepository $drillRepository): Response
    {
        return $this->render('drill/index.html.twig', [
            'drills' => $drillRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="drill_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $drill = new Drill();
        $form = $this->createForm(DrillType::class, $drill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($drill);
            $entityManager->flush();

            return $this->redirectToRoute('drill_index');
        }

        return $this->render('drill/new.html.twig', [
            'drill' => $drill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drill_show", methods={"GET"})
     */
    public function show(Drill $drill): Response
    {
        return $this->render('drill/show.html.twig', [
            'drill' => $drill,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="drill_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Drill $drill): Response
    {
        $form = $this->createForm(DrillType::class, $drill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('drill_index');
        }

        return $this->render('drill/edit.html.twig', [
            'drill' => $drill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="drill_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Drill $drill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$drill->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($drill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('drill_index');
    }
}
