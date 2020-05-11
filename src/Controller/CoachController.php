<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CoachController extends AbstractController
{
    /**
     * @Route("/coach", name="coachpage")
     * @IsGranted("ROLE_COACH")
     */
    public function index()
    {
        $template = 'coach/index.html.twig';
        $args = [];
        return $this->render($template,$args);
    }
}
