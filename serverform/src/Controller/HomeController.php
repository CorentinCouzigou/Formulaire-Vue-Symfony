<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    
    public function index(ManagerRegistry $doctrine, UserRepository $UserRepository, NormaliserInterface $Normaliser): Response
    {
        $usersList = $UserRepository->findAll();
        $postNormaliser = $Normaliser->normalize($usersList);
        $json = json_encode(postNormaliser);
        dd($json);
        dump('yo');
        return $this->render('home/index.html.twig');
    }
}
