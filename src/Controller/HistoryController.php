<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\History;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Session\Session;

class HistoryController extends AbstractController
{

    public function sessionHistory(AuthenticationUtils $authenticationUtils, Request $request, EntityManagerInterface $entityManager)
    {
        $session = $request->getSession();
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $lastUsername = strstr($lastUsername, "@", true);
        $user_id = $user->getId();
        $repository = $entityManager->getRepository(Categorie::class);
        
        $nameCategory = $session->get('nameCategory');
        if ($nameCategory) {
        $category = $entityManager->getRepository(Categorie::class)
        ->findBy(["name" => $nameCategory]);
        $categoryId = $category[0]->getId();
        $score = $session->get($nameCategory);

        $session->remove("nameCategory");
        
            $history = New History();
            $history->setIduser($user_id);
            $history->setIdCategorie($categoryId);
            $history->setScore($score);
            $entityManager->persist($history);
            $entityManager->flush();
        }
        $showHistory = $entityManager->getRepository(Categorie::class)->createQueryBuilder('c')
        ->select('c, d')
        ->leftJoin('App\Entity\History', 'd', 'WITH', 'c.id = d.id_categorie')
        ->where('d.id_user = :id')
        ->setParameter('id', $user_id)
        ->getQuery()
        ->getResult();
            foreach($showHistory as $key => $value){
                global $temp;
                if(method_exists($value, "getName")){
                    $temp = $value->getName();
                }else{
                    $result[] = ["name" => $temp, "score" => $value->getScore()];
                }
            }
            // for($i = 0; $i < count($showHistory); $i++){
                //     if($showHistory[$i] == "App\Entity\Categorie")
                //     var_dump($showHistory[$i]);
                // }
                // var_dump($showHistory[0]);
                // var_dump    ($result); 
        return $this->render('history.html.twig', ['showHistory' => $result]);
    }
}
