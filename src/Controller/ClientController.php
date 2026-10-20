<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Client;

class ClientController extends AbstractController
{
    #[Route('/clients', name: 'app_client_index')]
    public function index(ClientRepository $clientRepository): Response
    {
        // Récupération de tous les clients depuis la base de données
        $clients = $clientRepository->findAll();

        return $this->render('client/index.html.twig', [
            'clients' => $clients,
        ]);
    }


    #[Route('/client/{id}', name: 'app_client_show')]
    public function show(Client $client): Response
    {
        
        return $this->render('client/show.html.twig', [
            'client' => $client,
        ]);
    }

}