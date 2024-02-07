<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConditionsUtController extends AbstractController
{
    /**
     * @Route("/conditionsUt", name="app_conditionsUt")
     */

    public function Propos(): Response
    {
        return $this->render('footer/conditionsUt.html.twig');
    }
}
