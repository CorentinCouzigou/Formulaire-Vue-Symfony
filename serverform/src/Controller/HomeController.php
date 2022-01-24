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

// gestion des cors dans le fichier config/packages/nelmio_cors.yaml. 
class HomeController extends AbstractController
{
    // route pour utilisée avec son nom et sa méthode
    #[Route('/', name: 'home', methods: 'GET')]
    
    public function index(ManagerRegistry $doctrine, UserRepository $UserRepository, NormalizerInterface $normalizer): Response
    {
        // utilisation du repository pour utilisé la méthode findAll et trouver tous les utilisateurs.
        $usersList = $UserRepository->findAll();
        // serializer permet de transformer l'object trouvé pour ainsi le transformer en json par la suite
        $DataNormalise = $normalizer->normalize($usersList);
    
        // transformation en format JSON pour l'exportation au front.
        $json = json_encode($DataNormalise);
        // console.log symfony
        dump($json);
        // réponse au front avec les données, les données et le format des données.
        $response  = new Response($json,200,["content-type" => "application/json"]);
        return $response;
    }

    //  Route en méthode POST
    #[Route('/', name: 'home_adduser', methods:"POST")]

    public function AddUsers(ManagerRegistry $doctrine,Request $request): Response
    {   
        // récupération de la requete de front.
        $request = new Request();
        // transformation de ce json en objet.
        $data = json_decode($request->getContent());
        // utilisation du modele de user.
        $user = new User();
        // j'utilise les setter pour définir mes informations.
        $user->setPassword($data->password);
        dump($user);
        // utilisation de notre ORM pour permettre l'insertion des données dans notre BDD.
        $entityManager = $doctrine->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        // réponse envoyée au front.
        $response  = new Response("Données bien reçues !",200);
        return $response;
    }

    // même route avec la méthode delete
    #[Route('/', name: 'home_deleteuser', methods:"DELETE")]

    public function DeleteUsers(ManagerRegistry $doctrine, UserRepository $UserRepository,Request $request): Response
    {   
        
        $request = new Request();
        $data = json_decode($request->getContent());
        // on utlise notre repository pour trouver l'utilisateur a supprimer.
        $userSelected = $UserRepository->findOneBy(['id'=> $data]);
        dump($userSelected);
        // utilisation doctrine notre ORM pour remove notre user dans notre BDD.
        $entityManager = $doctrine->getManager();
        $entityManager->remove($userSelected);
        // flush lance l'action.
        $entityManager->flush();
       
        // réponse front
        $response  = new Response("Demande de suppression d'un utilisateur bien reçue !",200);
        return $response;
    }
    
    // posibilité de faire des routes avec un slug /users/{id}
    /* 
        #[Route('/users/{id}, name: 'UsersId', methods:"GET")]

    public function show($id, ManagerRegistry $doctrine, UserRepository $UserRepository, NormalizerInterface $normalizer)
    {
        $userSelected = $UserRepository->findOneBy(['id'=> $id]);
        dump($userSelected);
        $postNormaliser = $normalizer->normalize($usersList);
        $json = json_encode($DataNormalise);

        $response  = new Response($json,200,["content-type" => "application/json"]);
        return $response;


    }
    
    
    */

}
