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
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartsController extends AbstractController {
    public function showCharts(ChartBuilderInterface $chartBuilder, EntityManagerInterface $entityManager): Response
{
    $users = $entityManager->getRepository(User::class)->findAll();
    $totalUsers = count($users);

    $counts = [
        'Total' => $totalUsers,
        '24 heures' => $this->countLastLoggedUsers($users, 24),
        'Semaine' => $this->countLastLoggedUsers($users, 7 * 24),
        'Mois' => $this->countLastLoggedUsers($users, 30 * 24),
        'Année' => $this->countLastLoggedUsers($users, 365 * 24),
    ];

    $chart = $chartBuilder->createChart(Chart::TYPE_BAR);
    $chart->setData([
        'labels' => array_keys($counts),
        'datasets' => [
            [
                'label' => 'Utilisateurs',
                'backgroundColor' => 'rgb(255, 99, 132)',
                'borderColor' => 'rgb(255, 99, 132)',
                'data' => array_values($counts),
            ],
        ],
    ]);

    return $this->render('charts/charts.html.twig', ['chart' => $chart]);
}

private function countLastLoggedUsers($users, $hours)
{
    $count = 0;
    $currentTime = new \DateTime();

    foreach ($users as $user) {
        $lastLogged = \DateTime::createFromFormat('Y-m-d H:i:s', $user->getLastLogged());

        if ($lastLogged !== false) {
            $diff = $currentTime->diff($lastLogged);
            $diffHours = $diff->h + ($diff->days * 24);

            if ($diffHours <= $hours) {
                $count++;
            }
        }
    }

    return $count;
}

    public function showQuizzList(ChartBuilderInterface $chartBuilder, EntityManagerInterface $entityManager, AuthenticationUtils $authenticationUtils): Response  {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $quizz = $entityManager->getRepository(Categorie::class)
            ->findAll();
    return $this->render('charts/quizzList.html.twig', ['quizz' => $quizz]);
    }
    public function showQuizzCharts(ChartBuilderInterface $chartBuilder, Request $request, EntityManagerInterface $entityManager) {
        $id = $request->get('id');
        $historyCategory = $entityManager->getRepository(History::class)
            ->findBy(["id_categorie" => $id]);
        $numberHistoryCategory = count($historyCategory);
        $category = $entityManager->getRepository(Categorie::class)
            ->findAll();
        $numberCategory = count($category);

        $chart = $chartBuilder->createChart(Chart::TYPE_PIE);
        $chart->setData([
            'labels' => ['this quizz', 'All quizz'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)'],
                    'borderColor' => 'rgb(255, 255, 255)',
                    'data' => [$numberHistoryCategory, $numberCategory],
                ],
            ],
        ]);
        $chart->setOptions([
                    'width' => 400,
                    'height' => 300,
                ]);        
                $historyScores = [];
                $labels = [];
                
                for ($i = 0; $i < $numberHistoryCategory; $i++) {
                    $historyScore = $historyCategory[$i]->getScore();
                    $historyScores[] = $historyScore;
                
                    $label = "Score " . ($i + 1);
                    $labels[] = $label;
                }
                $chart2 = $chartBuilder->createChart(Chart::TYPE_BAR);
                $chart2->setData([
                    'labels' => $labels,
                    'datasets' => [
                        [
                            'label' => 'Scores',
                            'backgroundColor' => 'rgb(255, 99, 132)',
                            'borderColor' => 'rgb(255, 99, 132)',
                            'data' => $historyScores,
                        ],
                    ],
                ]);
        return $this->render('charts/quizzCharts.html.twig', ['chart' => $chart, 'chart2' => $chart2]);
    }
}