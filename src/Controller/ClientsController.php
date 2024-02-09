<?php

namespace App\Controller;

use App\Entity\Clients;

use App\Form\ClientsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;




class ClientsController extends AbstractController
{
    /** 
     * @Route("/clients", name="app_clients")
     **/
    public function clients(Request $request, EntityManagerInterface $entityManager): Response
    {
        echo '<pre>';
        print_r($this->getUser());
        echo '</pre>';
        //Vérifie si l'utilisateur est connecté
        if ($this->getUser()) {
            $client = new Clients();
            echo '<pre>';
            print_r($client->getId());
            echo '</pre>';
            $form = $this->createForm(ClientsType::class, $client);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $client = $form->getData();
                $client->setUser($this->getUser());
                $entityManager->persist($client);
                $entityManager->flush();
                return $this->redirectToRoute('app_index');
            }
            //Vérifie si $client est une instance de la classe Clients et si elle a une propriété "id"
            if ($client instanceof Clients && method_exists($client, 'getId')) {
                //Transmet $client à votre template
                return $this->render('clients/index.html.twig', [
                    'client' => $client,
                    'Clients' => $form->createView(),
                ]);
            } else {
                //Si l'utilisateur n'est pas connecté, redirige vers la page de connexion
                return $this->redirectToRoute('login');
            }
        }
    }


    /**
     * @Route("/clients/{id}/edit", name="app_editClient")
     */

    public function editClient(Request $request, EntityManagerInterface $entityManager, Clients $client): Response
    {

        // Vérifie si l'utilisateur est connecté et est le propriétaire du client
        if ($this->getUser() && $client->getUser() === $this->getUser()) {
            // Crée le formulaire avec le type ClientsType et l'entité client existant
            $form = $this->createForm(ClientsType::class, $client);
            $form->handleRequest($request);

            // Vérifie si le formulaire a été soumis et est valide
            if ($form->isSubmitted() && $form->isValid()) {
                // Enregistre les modifications dans la base de données
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($client);
                $entityManager->flush();

                // Redirige vers cette même page après modification
                return $this->redirectToRoute('app_editClient', ['id' => $client->id]);
            }

            return $this->render('clients/edit.html.twig', [
                'clients' => $form->createView(),
            ]);
        } else {
            // Si l'utilisateur n'est pas connecté ou n'est pas le propriétaire du client, redirige vers la page de connexion
            return $this->redirectToRoute('login');
        }
    }





    //         //Supprime un utilisateur associé à un client.
//         /**
//          * @Route("/clients/{id}/delete", name="deleteClient")
//          */
//         public function deleteClient(EntityManagerInterface $entityManager, Clients $client): Response
//         {
//             // Vérifie si l'utilisateur est connecté et est le propriétaire du client
//             if ($this->getUser() && $client->getUser() === $this->getUser()) {
//                 // Supprime l'utilisateur associé au client (cela dépend de votre configuration de relation)
//                 $entityManager->remove($client);
//                 $entityManager->flush();

    //                 return $this->redirectToRoute('app_index'); // Redirige vers la page d'accueil du site
//             } else {
//                 // Si l'utilisateur n'est pas connecté ou n'est pas le propriétaire du client, redirige vers la page de connexion
//                 return $this->redirectToRoute('login');
//             }
//         }

    // 
}