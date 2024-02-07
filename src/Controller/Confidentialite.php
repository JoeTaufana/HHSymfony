<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConfidentialiteController extends AbstractController
{
    /**
     * @Route("/confidentialite", name="app_confidentialite")
     */

    public function confidentialite(): Response
    {
        return $this->render('footer/confidentialite.html.twig');
    }
}
