<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categorie;
use App\Entity\User;
use App\Entity\Question;
use App\Entity\Reponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class QuizzController extends AbstractController
{
    public function displayAction(EntityManagerInterface $entitymanager, AuthenticationUtils $authenticationUtils)
    {
        $category = $entitymanager->getRepository(Categorie::Class)
            ->findAll();
        $repository = $entitymanager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        if ($user) {
            $lastUsername = strstr($lastUsername, "@", true);
            $data = ["id" => $user->getId(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
            return $this->render('quizz/index.html.twig', ["data" => $data, 'category' => $category]);
        }
        return $this->render('quizz/index.html.twig', ['category' => $category]);

    }
    public function show(EntityManagerInterface $entitymanager, Request $request, PaginatorInterface $paginator, AuthenticationUtils $authenticationUtils): Response
    {
        $id = $request->get('id');
        $question = $entitymanager->getRepository(Question::Class)
            ->findBy(["id_categorie" => $id]);
        $questionPage = $paginator->paginate($question, $request->query->getInt('page', 1), 1);
        $question_id = $questionPage[0]->getId("id");
        $response = $entitymanager->getRepository(Reponse::Class)
            ->findBy(["id_question" => $question_id]);
        $responseLength = count($response);
        $response_expected = $response[0]->getReponseExpected("response_expected");
        $length = count($question);
        $session = $request->getSession();
        $score = 0;
        if ($request->get('response')) {
            $repository = $entitymanager->getRepository(Reponse::class);
            $resp = $repository->findOneBy(['id' => $request->get('response')]);
            if ($resp->getReponseExpected() === 1) {
                $score = $request->get("score") ? $request->get("score") + 1 : 1;
            } else {
                $score = $request->get("score");
            }
        }
        $first = intval($request->get('firstresult')) ? intval($request->get('firstresult')) : 0;
        $question = $entitymanager->getRepository(Question::class)->createQueryBuilder('o')
            ->where('o.id_categorie like :id')
            ->setParameter('id', $id)
            ->setFirstResult($first)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();
        $category = $entitymanager->getRepository(Categorie::class)
            ->findBy(["id" => $id]);
        if ($first >= $length) {
            $_POST["score"] = $score;
            $session = $request->getSession();
            $session = $request->getSession();
            $nameCategory = $category[0]->getName();
            $session->set("nameCategory", $nameCategory);
            $session->set($nameCategory, $score);
            if ($authenticationUtils->getLastUsername()) {
                return $this->redirect('/user/history');
            } else {
                return $this->render('resume.html.twig', $_POST);
            }
        }
        $question_id = $question[0]->getId("id");
        $response = $entitymanager->getRepository(Reponse::class)
            ->findBy(["id_question" => $question_id]);
        $questionLength = $entitymanager->getRepository(Question::class)
            ->findBy(["id_categorie" => $id]);
        // print_r($category);
        $length = count($questionLength);
        return $this->render('quizz/show.html.twig', [ 'questionPage' => $question, 'response' => $response, 'id' => $id, 'idquestion' => $first + 1, "score" => $score, 'length' => $length, 'first' => $first]);
    }
    #[Route('/user/quizz/create', name: 'app_create_quizz')]
    public function create(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator, AuthenticationUtils $authenticationUtils): Response
    {
        $categorie = $entityManager->getRepository(Categorie::class)
        ->createQueryBuilder('c')
        ->select('c, count(d.id_categorie) as nbr, d.id_categorie')
        ->leftJoin('App\Entity\Question', 'd', 'WITH', 'c.id = d.id_categorie')
        ->groupBy("d.id_categorie")
        ->groupBy("c.id")
        ->having("count(d.id_categorie) < 10")
        ->getQuery()
        ->getResult();
        if(isset($categorie[0])){
            return $this->render('quizz/index_cate.html.twig', ["data" => $categorie]);
        }else{
            return $this->redirect("/quizz");
        }
    }

    #[Route('/user/question/add/{id}', name: 'app_create_question_quizz')]
    public function createQuestion(EntityManagerInterface $entityManager, Request $request): Response
    {
        return $this->render('quizz/add_question.html.twig', ["data" => ["id" => $request->get("id")]]);
    }

    #[Route('/user/question/addto/', name: 'app_created_questions_quizz')]
    public function createdQuestionDb(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator, AuthenticationUtils $authenticationUtils): Response
    {
        $question = new Question();
        $question->setQuestion($request->get("question"));
        $question->setId_Categorie($request->get("id"));
        $entityManager->persist($question);
        $entityManager->flush();
        $idQuestion = $question->getId();

        echo $request->get('expected');
        $reponse1 = new Reponse();
        $reponse1->setReponse($request->get("reponse1"));
        $reponse1->setIdQuestion($idQuestion);
        $response_expected1 = $request->get("expected") == 1 ? 1 : 0;
        $reponse1->setReponseExpected($response_expected1);
        $entityManager->persist($reponse1);
        $entityManager->flush();

        $reponse2 = new Reponse();
        $reponse2->setReponse($request->get("reponse2"));
        $reponse2->setIdQuestion($idQuestion);
        $response_expected2 = $request->get("expected") == 2 ? 1 : 0;
        $reponse2->setReponseExpected($response_expected2);
        $entityManager->persist($reponse2);
        $entityManager->flush();

        $reponse3 = new Reponse();
        $reponse3->setReponse($request->get("reponse3"));
        $reponse3->setIdQuestion($idQuestion);
        $response_expected3 = $request->get("expected") == 3 ? 1 : 0;
        $reponse3->setReponseExpected($response_expected3);
        $entityManager->persist($reponse3);
        $entityManager->flush();
        $_POST = [];
        return $this->redirect("/user/quizz/create");
    }
}
