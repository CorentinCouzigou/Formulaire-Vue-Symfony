<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    
    public function index(ManagerRegistry $doctrine, UserRepository $UserRepository, NormalizerInterface $normalizer): Response
    {
        $usersList = $UserRepository->findAll();
        $postNormaliser = $normalizer->normalize($usersList);
        dump($postNormaliser);
        $json = json_encode($postNormaliser[0]);
        dump($json);
        $response  = new Response($json,200,["content-type" => "application/json"]);
        return $response;
    }
}
