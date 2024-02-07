<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooterController extends AbstractController
{
    /**
     * @Route("/aPropos", name="app_aPropos")
     */

    public function Propos(): Response
    {
        return $this->render('footer/aPropos.html.twig');
    }

    /**
     * @Route("/conditionsUt", name="app_conditionsUt")
     */

    public function conditions(): Response
    {
        return $this->render('footer/conditionsUt.html.twig');
    }

    /**
     * @Route("/confidentialite", name="app_confidentialite")
     */

    public function confidentialite(): Response
    {
        return $this->render('footer/confidentialite.html.twig');
    }

    /**
     * @Route("/contact", name="app_contact")
     */

    public function contact(): Response
    {
        return $this->render('footer/contact.html.twig');
    }

    /**
     * @Route("/mentionsLegales", name="app_mentionsLegales")
     */

    public function mentionsLegales(): Response
    {
        return $this->render('footer/mentionsLegales.html.twig');
    }
}
