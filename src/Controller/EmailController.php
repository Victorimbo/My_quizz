<?php
// src/Controller/MailerController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Controller\SecurityController;
use App\Entity\Categorie;
use App\Entity\History;
use App\Repository\UserRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Mime\Address;

class EmailController extends AbstractController
{
    #[Route('/email')]
    public function sendEmail(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        $date30 = date('Y-m-d H:i:s', strtotime('-30 days'));
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.last_logged > :date')
            ->setParameter('date', $date30)
            ->getQuery()
            ->getResult();
        for ($i = 0; $i < count($result); $i++) {
            $mail = $result[$i]->getEmail();
            $email = (new Email())
                ->from(new Address('mailtrap@mail.fiseg.fr', 'Vibot'))
                ->to($mail)
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>Ne me quitte pas</p>');
            $mailer->send($email);
        }
        return $this->redirect("/admin/emails");
    }
    #[Route('/emailold')]
    public function sendEmailOld(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        $date30 = date('Y-m-d H:i:s', strtotime('-30 days'));
        $result = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.last_logged < :date')
            ->setParameter('date', $date30)
            ->getQuery()
            ->getResult();
        for ($i = 0; $i < count($result); $i++) {
            $mail = $result[$i]->getEmail();
            $email = (new Email())
                ->from(new Address('mailtrap@mail.fiseg.fr', 'Vibot'))
                ->to($mail)
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>ça fait longtemps man revient</p>');
            $mailer->send($email);
        }
        return $this->redirect("/admin/emails");
    }
    #[Route('/email/sendold/{iduser}/{idquizz}')]
    public function sendEmailToUser(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        $user = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.id = :id')
            ->setParameter('id', $request->get("iduser"))
            ->getQuery()
            ->getResult();
        $quizz = $entityManager->getRepository(Categorie::class)->createQueryBuilder('o')
            ->where('o.id = :idquizz')
            ->setParameter('idquizz', $request->get("idquizz"))
            ->getQuery()
            ->getResult();
        $histoquizz = $entityManager->getRepository(History::class)->createQueryBuilder('o')
            ->where('o.id_categorie = :idquizz')
            ->andWhere('o.id_user = :iduser')
            ->setParameter('idquizz', $request->get("idquizz"))
            ->setParameter('iduser', $request->get("iduser"))
            ->getQuery()
            ->getResult();
        $name = $quizz[0]->getName();
        $score = $histoquizz[0]->getScore();
        for ($i = 0; $i < count($user); $i++) {
            $mail = $user[$i]->getEmail();
            $email = (new Email())
                ->from(new Address('mailtrap@mail.fiseg.fr', 'Vibot'))
                ->to($mail)
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html("<p>Il était bien le quizz $name t'avais eu un score de $score</p>");
            $mailer->send($email);
        }
        return $this->redirect("/admin/emails");
    }
    #[Route('/email/sendnew/{iduser}/{idquizz}')]
    public function sendEmailToUserNew(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager, Request $request, Security $security, UserPasswordHasherInterface $passwordHasher, MailerInterface $mailer): Response
    {
        $user = $entityManager->getRepository(User::class)->createQueryBuilder('o')
            ->where('o.id = :id')
            ->setParameter('id', $request->get("iduser"))
            ->getQuery()
            ->getResult();
        $quizz = $entityManager->getRepository(Categorie::class)->createQueryBuilder('o')
            ->where('o.id = :idquizz')
            ->setParameter('idquizz', $request->get("idquizz"))
            ->getQuery()
            ->getResult();
        $name = $quizz[0]->getName();
        for ($i = 0; $i < count($user); $i++) {
            $mail = $user[$i]->getEmail();
            $email = (new Email())
                ->from(new Address('mailtrap@mail.fiseg.fr', 'Vibot'))
                ->to($mail)
                ->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html("<p>Le quizz $name est le meilleur du site hésite pas a venir man</p>");
            $mailer->send($email);
        }
        return $this->redirect("/admin/emails");
    }
}
