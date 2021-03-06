<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template,$args);
    }
    /**
     * @Route("/about", name="aboutpage")
     */
    public function about()
    {
        $template = 'default/about.html.twig';
        $args = [];
        return $this->render($template,$args);
    }

    /**
     * @Route("/player", name="player")
     */
    public function playerhomepage()
    {
        $template = 'player/playerhomepage.html.twig';
        $args = [];
        return $this->render($template,$args);
    }

    /**
     * @Route("/timetable", name="timetable")
     */
    public function timetable()
    {
        $template = 'player/timetable.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/Footballvideos", name="Footballvideos")
     */
    public function Footballvideos()
    {
        $template = 'player/Footballvideos.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/Basketballvideos", name="Basketballvideos")
     */
    public function Basketballvideos()
    {
        $template = 'player/Basketballvideos.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/Cricketvideos", name="Cricketvideos")
     */
    public function videos()
    {
        $template = 'player/Cricketvideos.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/bmi", name="bmi")
     */
    public function bmi()
    {
        $template = 'player/bmi.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/bmr", name="bmr")
     */
    public function bmr()
    {
        $template = 'player/bmr.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/ToDOList", name="ToDOList")
     */
    public function ToDOList()
    {
        $template = 'player/ToDOList.html.twig';
        $args = [];
        return $this->render($template,$args);
    }
    /**
     * @Route("/timer", name="timer")
     */
    public function timer()
    {
        $template = 'player/timer.html.twig';
        $args = [];
        return $this->render($template,$args);
    }
}