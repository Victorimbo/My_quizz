<?php

namespace App\Controller;

use App\Entity\user;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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

class SuperAdminController extends AbstractController
{
    #[Route('/superadmin', name: 'app_super_admin')]
    public function index(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->setParameter('roles', '%ROLE_ADMIN%')
            ->getQuery()
            ->getResult();
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $lastUsername = strstr($lastUsername, "@", true);
        $data = ["id" => $user->getId(), "email" => $user->getEmail(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
        return $this->render('super_admin/index.html.twig', [
            "result" => $result, "data" => $data
        ]);
    }
    #[Route('/superadmin/add', name: 'app_add_supers_admin')]
    public function addform(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->setParameter('roles', '[]')
            ->getQuery()
            ->getResult();
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $lastUsername = strstr($lastUsername, "@", true);
        $data = ["id" => $user->getId(), "email" => $user->getEmail(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
        return $this->render('super_admin/add.html.twig', [
            "result" => $result, "data" => $data
        ]);
    }
    #[Route('/superadmin/search/', name: 'app_search_super_admin')]
    public function searchform(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher): Response
    {
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.roles like :roles')
            ->andWhere('o.email like :email')
            ->setParameter('roles', '[]')
            ->setParameter('email', "%" . $request->get('search') . "%")
            ->getQuery()
            ->getResult();
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $lastUsername = strstr($lastUsername, "@", true);
        $data = ["id" => $user->getId(), "email" => $user->getEmail(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
        return $this->render('super_admin/add.html.twig', [
            "result" => $result, "data" => $data
        ]);
    }
    #[Route('/superadmin/add/{id}', name: 'app_add_id_super_admin')]
    public function adddbform(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $user = $repository->findOneBy(['id' => $request->get("id")]);
        $user->setRoles(["ROLE_ADMIN"]);
        $repository->save($user, true);
        return $this->addform($authenticationUtils,  $entityManager,  $request,  $security,  $passwordHasher);
    }
    #[Route('/superadmin/revoke/{id}', name: 'app_super_admin_remove')]
    public function remove(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $user = $repository->findOneBy(['id' => $request->get("id")]);
        $user->setRoles([]);
        $repository->save($user, true);
        return $this->index($authenticationUtils,  $entityManager,  $request,  $security,  $passwordHasher);
    }
}
