<?php
// src/Controller/UserController.php
namespace App\Controller;

use App\Entity\User;
use App\Entity\Categorie;
use App\Controller\SecurityController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Mime\Address;

class UserController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }
    #[Route('/', name: 'homepageuser')]
    public function homeUser(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {
        return $this->homepage($authenticationUtils, $entityManager);
    }

    public function homepage(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        if(!$user){
            return $this->redirectToRoute('app_login');
        }
        if (!$user->isVerified()) {
            $this->emailVerifier->sendEmailConfirmation(
                'app_verify_email',
                $user,
                (new TemplatedEmail())
                    ->from(new Address('mailtrap@mail.fiseg.fr', 'Vibot'))
                    ->to($user->getEmail())
                    ->subject('Please Confirm your Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
        }
        // $user->setLastLogged();
        $date = new \DateTime('now');
        $user->setLastLogged($date->format("Y-m-d H:i:s"));
        $repository->save($user, true);
        $lastUsername = strstr($lastUsername, "@", true);
        $data = ["id" => $user->getId(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
        return $this->render("home.html.twig", ["data" => $data]);
    }

    public function edit(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $lastUsername = strstr($lastUsername, "@", true);
        $data = ["id" => $user->getId(), "email" => $user->getEmail(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
        return $this->render("edit.html.twig", ["data" => $data]);
    }
    public function editdb(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $olduser = $user->getEmail();
        $logger = false;
        $error = false;
        if ($request->get("email") !== $user->getEmail()) {
            $user->setEmail($request->get("email"));
            $user->setIsVerified(false);
            $logger = true;
        }
        if ($request->get("password") === $request->get("passwordConfirm") && $request->get("password") !== "" && $request->get("password") !== null) {
            echo $request->get("password");
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $request->get("password")
            );
            $user->setPassword($hashedPassword);
        }
        $repository->save($user, true);

        $lastUsername = strstr($lastUsername, "@", true);
        if ($logger) {
            $security->logout(false);
            return $this->redirect("/login");
        } else {
            return $this->redirect("/user");
        }
    }

    public function profile(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request): Response
    {
        $repository = $entityManager->getRepository(User::class);
        $lastUsername = $authenticationUtils->getLastUsername();
        $user = $repository->findOneBy(['email' => $lastUsername]);
        $lastUsername = strstr($lastUsername, "@", true);
        $data = ["id" => $user->getId(), "name" => $lastUsername, "roles" => $user->getRoles()[0]];
        $oldquizz = $entityManager->getRepository(Categorie::class)->createQueryBuilder('c')
            ->select('c, d')
            ->leftJoin('App\Entity\History', 'd', 'WITH', 'c.id = d.id_categorie')
            ->where('d.id_user = :id')
            ->setParameter('id', $data["id"])
            ->getQuery()
            ->getResult();
        $result = [];
        foreach ($oldquizz as $key => $value) {
            global $temp, $tempid;
            if (method_exists($value, "getName")) {
                $temp = $value->getName();
                $tempid = $value->getId();
            } else {
                $result[] = ["name" => $temp, "id" => $tempid, "score" => $value->getScore()];
            }
        }
        return $this->render("profile.html.twig", ["data" => $data, "oldquizz" => $result]);
    }
}
