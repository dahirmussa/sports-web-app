<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CoacheController extends AbstractController
{
    /**
     * @Route("/coache", name="coache")
     */
    public function index()
    {
        $template = 'coache/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}