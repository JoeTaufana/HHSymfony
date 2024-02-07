<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefiController extends AbstractController
{
    /**
     * @Route("/defi", name="app_défi")
     */
   
    public function choixDefi(): Response
    {
        return $this->render('defi/choixDefi.html.twig', [
            'controller_name' => 'DefiController',
        ]);
    }

    /**
     * @Route("/defiZen", name="app_défiZen")
     */
   
     public function defiZen(): Response
     
     {
         return $this->render('defi/defiZen.html.twig', [
             'controller_name' => 'DefiController',
         ]);
     }

     
    /**
     * @Route("/defiFun", name="app_défiFun")
     */
   
     public function defiFun(): Response
     
     {
         return $this->render('defi/defiFun.html.twig', [
             'controller_name' => 'DefiController',
         ]);
     }

     
    /**
     * @Route("/defiGourmand", name="app_défiGourmand")
     */
   
     public function defiGourmand(): Response
     
     {
         return $this->render('defi/defiGourmand.html.twig', [
             'controller_name' => 'DefiController',
         ]);
     }

     /**
     * @Route("/nouveauDefi", name="app_nouveauDefi")
     */
   
     public function nouveauDefi(): Response
     
     {
         return $this->render('defi/nouveauDefi.html.twig', [
             'controller_name' => 'DefiController',
         ]);
     }


}
