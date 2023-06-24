<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\user;
use Doctrine\ORM\EntityManagerInterface;
use App\Controller\SecurityController;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Mime\Address;
use App\Entity\Categorie;
use App\Entity\Question;
use App\Entity\Reponse;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends AbstractController
{
    #[Route('/admin/emails', name: 'app_emails_admin')]
    public function emailAdmin(EntityManagerInterface $entityManager): Response
    {
        return $this->render('admin/emails.html.twig', [
        ]);
    }
    #[Route('/admin/categories', name: 'app_categories_admin')]
    public function categoriesAdmin(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getRepository(Categorie::class)
            ->findAll();
        return $this->render('admin/index_cate.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/categories/edit/{id}', name: 'app_categories_edit_admin')]
    public function editCategoriesAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $result = $entityManager->getRepository(Categorie::class)
            ->findOneBy(["id" => $request->get("id")]);
        $questions = $entityManager->getRepository(Question::class);
        $questions = $questions->findBy(["id_categorie" => $request->get("id")]);
        echo "<pre>";
        // var_dump($questions[0]["question"]);
        echo "</pre>";
        return $this->render('admin/edit_cate.html.twig', [
            "data" => $result, "questions" => $questions
        ]);
    }
    #[Route('/admin/edit/question/{id}', name: 'app_question_edit_admin')]
    public function editQuestionAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $result = $entityManager->getRepository(Question::class)
            ->findOneBy(["id" => $request->get("id")]);
        $questions = $entityManager->getRepository(Reponse::class);
        $questions = $questions->findBy(["id_question" => $request->get("id")]);
        echo "<pre>";
        // var_dump($questions[0]["question"]);
        echo "</pre>";
        return $this->render('admin/edit_question.html.twig', [
            "data" => $result, "reponse" => $questions
        ]);
    }
    #[Route('/admin/edit/reponse/{id}', name: 'app_reponse_edit_admin')]
    public function editReponseAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $result = $entityManager->getRepository(Reponse::class)
            ->findOneBy(["id" => $request->get("id")]);
        return $this->render('admin/edit_reponse.html.twig', [
            "data" => $result,
        ]);
    }
    #[Route('/admin/categories/edit/', name: 'app_categories_edited_admin')]
    public function editedCategoriesAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repo = $entityManager->getRepository(Categorie::class);
        $result = $repo->findOneBy(["id" => $request->get("id")]);
        $result->setName($request->get("name"));
        $repo->save($result, true);
        return $this->categoriesAdmin($entityManager);
    }
    #[Route('/admin/reponse/edited/', name: 'app_reponse_edited_admin')]
    public function editedReponseAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repo = $entityManager->getRepository(Reponse::class);
        $result = $repo->findOneBy(["id" => $request->get("id")]);
        $result->setReponse($request->get("reponse"));
        $repo->save($result, true);
        return $this->categoriesAdmin($entityManager);
    }
    #[Route('/admin/question/edited/', name: 'app_question_edited_admin')]
    public function editedQuestionAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repo = $entityManager->getRepository(Question::class);
        $result = $repo->findOneBy(["id" => $request->get("id")]);
        $result->setQuestion($request->get("question"));
        $repo->save($result, true);
        return $this->categoriesAdmin($entityManager);
    }
    #[Route('/admin/categories/delete/{id}', name: 'app_categories_delete_admin')]
    public function deleteCategoriesAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repo = $entityManager->getRepository(Categorie::class);
        $result = $repo->findOneBy(["id" => $request->get("id")]);
        $repo->remove($result, true);
        return $this->categoriesAdmin($entityManager);
    }
    #[Route('/admin/delete/question/{id}', name: 'app_question_delete_admin')]
    public function deleteQuestionAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repo = $entityManager->getRepository(Question::class);
        $result = $repo->findOneBy(["id" => $request->get("id")]);
        $repo->remove($result, true);
        return $this->categoriesAdmin($entityManager);
    }
    #[Route('/admin/delete/reponse/{id}', name: 'app_reponse_delete_admin')]
    public function deleteReponseAdmin(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repo = $entityManager->getRepository(Reponse::class);
        $result = $repo->findOneBy(["id" => $request->get("id")]);
        $repo->remove($result, true);
        return $this->categoriesAdmin($entityManager);
    }
    #[Route('/admin', name: 'app_admin')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->setParameter('roles', '%ROLE_ADMIN%')
            ->getQuery()
            ->getResult();
        return $this->render('admin/index.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/add', name: 'app_add_admin')]
    public function addform(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->setParameter('roles', '[]')
            ->getQuery()
            ->getResult();
        return $this->render('admin/add.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/search/', name: 'app_search_admin')]
    public function searchform(EntityManagerInterface $entityManager, Request $request): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->andWhere('o.email like :email')
            ->setParameter('roles', '[]')
            ->setParameter('email', "%" . $request->get('search') . "%")
            ->getQuery()
            ->getResult();
        return $this->render('admin/add.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/user/', name: 'app_add_dadmin')]
    public function addFormUser(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->setParameter('roles', '[]')
            ->getQuery()
            ->getResult();
        return $this->render('admin/useradd.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/user/add', name: 'app_adduser_dadmin')]
    public function adduserFormUser(EntityManagerInterface $entityManager): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->setParameter('roles', '[]')
            ->getQuery()
            ->getResult();
        return $this->render('admin/force.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/user/modif/{id}', name: 'app_addd_admin')]
    public function modifUser(EntityManagerInterface $entityManager, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $data = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.email = :email')
            ->setParameter('email', $authenticationUtils->getLastUsername())
            ->getQuery()
            ->getResult();
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.id = :id')
            ->setParameter('id', $request->get('id'))
            ->getQuery()
            ->getResult();
        $info = ["id" => $data[0]->getId(), "name" => $data[0]->getEmail(), "roles" => $data[0]->getRoles(), "email" => $data[0]->getEmail()];
        return $this->render('admin/modifuser.html.twig', [
            "data" => $info, "result" => $result[0]
        ]);
    }
    #[Route('/admin/user/modif/', name: 'app_dadddd_admin')]
    public function modifUserDb(EntityManagerInterface $entityManager, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $data = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.email = :email')
            ->setParameter('email', $authenticationUtils->getLastUsername())
            ->getQuery()
            ->getResult();
        $repo = $entityManager->getRepository(User::class);
        $user = $repo->findOneBy(['id' => $request->get("id")]);
        if ($request->get("verif")) {
            $user->setIsVerified(true);
            $repo->save($user, true);
        }
        if ($user->getEmail() !== $request->get("email")) {
            $user->setEmail($request->get("email"));
            $user->setIsVerified(true);
            $repo->save($user, true);
        }
        $info = ["id" => $data[0]->getId(), "name" => $data[0]->getEmail(), "roles" => $data[0]->getRoles(), "email" => $data[0]->getEmail()];
        return $this->addFormUser($entityManager);
    }
    #[Route('/admin/user/delete/{id}', name: 'app_adddd_admin')]
    public function deleteUserDb(EntityManagerInterface $entityManager, Request $request, AuthenticationUtils $authenticationUtils): Response
    {
        $data = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.email = :email')
            ->setParameter('email', $authenticationUtils->getLastUsername())
            ->getQuery()
            ->getResult();
        $repo = $entityManager->getRepository(User::class);
        $user = $repo->findOneBy(['id' => $request->get("id")]);
        $entityManager->remove($user);
        $entityManager->flush();
        $info = ["id" => $data[0]->getId(), "name" => $data[0]->getEmail(), "roles" => $data[0]->getRoles(), "email" => $data[0]->getEmail()];
        return $this->addFormUser($entityManager);
    }
    #[Route('/admin/user/search/', name: 'app_search_admin')]
    public function searchFormUser(EntityManagerInterface $entityManager, Request $request): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.email like :email')
            ->setParameter('email', "%" . $request->get('search') . "%")
            ->getQuery()
            ->getResult();
        return $this->render('admin/add.html.twig', [
            "data" => $result
        ]);
    }
    #[Route('/admin/add/{id}', name: 'app_add_id_admin')]
    public function adddbform(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $user = $repository->findOneBy(['id' => $request->get("id")]);
        $user->setRoles(["ROLE_ADMIN"]);
        $repository->save($user, true);
        return $this->addform($entityManager);
    }
    #[Route('/admin/user/added', name: 'app_add_createuser_admin')]
    public function addUserIndb(EntityManagerInterface $entityManager, Request $request, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $error = null;
        if ($repository->findOneBy(["email" => $request->get("email")])) {
            $error = "Le mail est déjà utilisé";
        } else {
            $user = new User();
            $user->setEmail($request->get("email"));
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $request->get('password')
                )
            );
            $user->setIsVerified(true);
            $date = new \DateTime("now");
            $user->setLastLogged($date->format("Y-m-d H:i:s"));
            $entityManager->persist($user);
            $entityManager->flush();
        }
        return $this->render("admin/force.html.twig", ["error" => $error]);
    }
    #[Route('/admin/user/old/{id}', name: 'app_add_id_admin')]
    public function quizzOld(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $oldquizz = $entityManager->getRepository(Categorie::class)->createQueryBuilder('c')
            ->select('c, d')
            ->leftJoin('App\Entity\History', 'd', 'WITH', 'c.id = d.id_categorie')
            ->where('d.id_user = :id')
            ->setParameter('id', $request->get("id"))
            ->getQuery()
            ->getResult();
        $result = [];
        foreach ($oldquizz as $key => $value) {
            global $temp, $tempid;
            if (method_exists($value, "getName")) {
                $temp = $value->getName();
                $tempid = $value->getId();
            } else {
                $result[] = ["name" => $temp, "id" => $tempid];
            }
        }
        return $this->render("admin/sendold.html.twig", ["result" => $result, "userid" => $request->get("id")]);
    }
    #[Route('/admin/user/new/{id}', name: 'app_add_old_id_admin')]
    public function quizzNew(EntityManagerInterface $entityManager, Request $request): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $oldquizz = $entityManager->getRepository(Categorie::class)->createQueryBuilder('c')
            ->select('c')
            ->leftJoin('App\Entity\History', 'd', 'WITH', 'c.id = d.id_categorie')
            ->where('d.id_user = :id')
            ->setParameter('id', $request->get("id"))
            ->getQuery()
            ->getResult();
        $quizz = $entityManager->getRepository(Categorie::class)->createQueryBuilder('c')
            ->select('c')
            ->getQuery()
            ->getResult();
        $goodquizz = array_udiff(
            $quizz,
            $oldquizz,
            function ($obj_a, $obj_b) {
                return $obj_a->getId() - $obj_b->getId();
            }
        );
        $result = [];
        foreach ($goodquizz as $key => $value) {
            global $temp, $tempid;
            if (method_exists($value, "getName")) {
                $temp = $value->getName();
                $tempid = $value->getId();
                $result[] = ["name" => $temp, "id" => $tempid];
            }
        }
        return $this->render("admin/sendnew.html.twig", ["result" => $result, "userid" => $request->get("id")]);
    }
    #[Route('/admin/categorie/addform/', name: 'app_created_categorie_quizz')]
    public function createdCategories(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator, AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render("admin/formcate.html.twig");
    }
    #[Route('/admin/categorie/add/', name: 'app_created_categories_quizz')]
    public function createdCategoriesDb(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator, AuthenticationUtils $authenticationUtils): Response
    {
        $categorie = new Categorie();
        $categorie->setName($request->get("name"));
        $entityManager->persist($categorie);
        $entityManager->flush();
        return $this->redirect("/user/quizz/create");
    }
}
