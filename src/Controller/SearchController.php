<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Routing\Annotation\Route;
use function Sodium\add;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     */
    public function index()
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    public function searchBar()
    {
        $form = $this->createFormBuilder(null)
        ->add('query',TextType::class)
        ->add('search',SubmitType::class,[
            'atr'=>[
                'class'=> 'btn btn-primary'
            ]
            ])
            ->getForm();

        return $this->render('search/searchBar.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}
