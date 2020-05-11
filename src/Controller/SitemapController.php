<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap", name="sitemap")
     */
       public function index()
       {
        $template = 'sitemap/index.html.twig';
        $args = [];
        return $this->render($template,$args);
       }
}