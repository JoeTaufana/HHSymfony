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
        } else {
            // non logué il faut le rediriger vers la page login
            return $this->redirectToRoute('login');
        }

        return $this->render('clients/index.html.twig', [
            'Clients' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profil", name="app_profil")
     */
    function profil(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()) {
            $client = $entityManager->getRepository(Clients::class)->findOneBy(['user' => $this->getUser()]);
            $form = $this->createForm(RegistrationFormClientsType::class, ['user' => $this->getUser(), 'client' => $client]);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isSubmitted()) {
                // il faut lier le user et le client via la clé commune

                // $client->setUser($this->getUser());
                // $entityManager->persist($client);
                // $entityManager->flush();
                // return $this->render('index/index.html.twig', [
                //     'Clients' => $form->createView(),
                // ]);
            }

            return $this->render('clients/profil.html.twig', [
                'ClientUser' => $form->createView(),
            ]);
        } else {
            // non logué il faut le rediriger vers la page login
            return $this->redirectToRoute('login');
        }

    }
}

