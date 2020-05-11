<?php

namespace App\Controller;

use App\Entity\PlayerDrill;
use App\Form\PlayerDrillType;
use App\Repository\PlayerDrillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/playerdrill")
 * @IsGranted("ROLE_COACH")
 *
 */
class PlayerDrillController extends AbstractController
{
    /**
     * @Route("/", name="player_drill_index", methods={"GET"})
     */
    public function index(PlayerDrillRepository $playerDrillRepository): Response
    {
        return $this->render('player_drill/index.html.twig', [
            'player_drills' => $playerDrillRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="player_drill_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $playerDrill = new PlayerDrill();
        $form = $this->createForm(PlayerDrillType::class, $playerDrill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($playerDrill);
            $entityManager->flush();

            return $this->redirectToRoute('player_drill_index');
        }

        return $this->render('player_drill/new.html.twig', [
            'player_drill' => $playerDrill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="player_drill_show", methods={"GET"})
     */
    public function show(PlayerDrill $playerDrill): Response
    {
        return $this->render('player_drill/show.html.twig', [
            'player_drill' => $playerDrill,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="player_drill_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PlayerDrill $playerDrill): Response
    {
        $form = $this->createForm(PlayerDrillType::class, $playerDrill);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('player_drill_index');
        }

        return $this->render('player_drill/edit.html.twig', [
            'player_drill' => $playerDrill,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="player_drill_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PlayerDrill $playerDrill): Response
    {
        if ($this->isCsrfTokenValid('delete'.$playerDrill->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($playerDrill);
            $entityManager->flush();
        }

        return $this->redirectToRoute('player_drill_index');
    }
}
