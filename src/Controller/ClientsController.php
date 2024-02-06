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
    private $entityManager;

    public function _construct() {
        $this->entityManager = $this->getDoctrine()->getManager();
    }

    #[Route('/clients', name: 'app_clients')]
    public function clients(Request $request): Response
    {   
        $client = new Clients();
        $form = $this->createForm(ClientsType::class, $client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // il faut lier le user et le client via la clé commune
            $client->setUser($this->getUser());
            $this->entityManager->persist($client);
            $this->entityManager->flush();
            return $this->render('clients/index.html.twig', [
                'Clients' => $form->createView(),
            ]);
        }

        return $this->render('clients/index.html.twig', [
            'Clients' => $form->createView(),
        ]);
    }
}

