<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PredfController extends AbstractController
{
   
    /**
     * @Route("/predf", name="app_predf")
     */
    public function index(): Response
    {
        return $this->render('predf/index.html.twig', [
            'controller_name' => 'PredfController',
        ]);
    }
}