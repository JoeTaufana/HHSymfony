<?php

namespace App\Controller;

use App\Entity\Clients;
use App\Entity\User;
use App\Form\RegistrationFormClientsType;
use App\Form\ClientsType;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ClientsController extends AbstractController
{

    /**
     * @Route("/clients", name="app_clients")
     */
    function clients(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()) {
            $client = new Clients();
            $form = $this->createForm(ClientsType::class, $client);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // il faut lier le user et le client via la clé commune
                $client->setUser($this->getUser());
                $entityManager->persist($client);
                $entityManager->flush();
                return $this->render('index/index.html.twig', [
                    'Clients' => $form->createView(),
                ]);
            }
            
            return $this->render('clients/index.html.twig', [
                'Clients' => $form->createView(),
            ]);
        } else {
            // non logué il faut le rediriger vers la page login
            return $this->redirectToRoute('login');
        }   
    }
    // public function editerClient(Request $request, Clients $client): Response
    // {
    //     $formulaire = $this->createForm(ClientsType::class, $client);

    //     $formulaire->handleRequest($request);

    //     if ($formulaire->isSubmitted() && $formulaire->isValid()) {
    //         // Mettez à jour l'entité Client avec les données du formulaire
    //         $this->getDoctrine()->getManager()->flush();

    //         $this->addFlash('success', 'Les informations du client ont été mises à jour avec succès.');

    //         return $this->redirectToRoute('votre_route_pour_afficher_les_clients');
    //     }

    //     return $this->render('client/editer.html.twig', [
    //         'formulaire' => $formulaire->createView(),
    //     ]);
    // }
}


