<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgendaController extends AbstractController
{
    /**
     * @Route("/agenda", name="app_agenda")
     */

    public function agenda(): Response
    {
        return $this->render('agenda/agenda.html.twig');
    }
}