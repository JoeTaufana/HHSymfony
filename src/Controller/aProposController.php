<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class aProposController extends AbstractController
{

    /**
     * @Route("/aPropos", name="app_aPropos")
     */
    public function aPropos(): Response
    {
        return $this->render('footer/aPropos.html.twig');
    }
}
