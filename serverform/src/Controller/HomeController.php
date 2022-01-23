<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: 'GET')]
    
    public function index(ManagerRegistry $doctrine, UserRepository $UserRepository, NormalizerInterface $normalizer): Response
    {
        $usersList = $UserRepository->findAll();
        $postNormaliser = $normalizer->normalize($usersList);
        dump($postNormaliser);
        $json = json_encode($postNormaliser);
        dump($json);
        dump('tata');
        $response  = new Response($json,200,["content-type" => "application/json"]);
        return $response;
    }

    #[Route('/', name: 'home_adduser', methods:"POST")]

    public function AddUsers(ManagerRegistry $doctrine,Request $request): Response
    {   
        
        $request = new Request();
        $data = json_decode($request->getContent());
        // dump($data);
        $user = new User();
        // dump($user);
        $user->setEmail($data->email);
        $user->setPassword($data->password);
        dump($user);
        $entityManager = $doctrine->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

 
    
        $response  = new Response("Données bien reçues !",200);
        return $response;
    }
}
