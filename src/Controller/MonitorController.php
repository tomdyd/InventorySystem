<?php

namespace App\Controller;

use App\Entity\Monitor;
use App\Entity\User;
use App\Form\MonitorType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class MonitorController extends AbstractController
{
    #[Route('/monitor', name: 'app_monitor')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $form = $this->createForm(MonitorType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $monitor = $form->getData();
            $entityManager->persist($monitor);
            $entityManager->flush();
            return $this->redirectToRoute('app_monitor');
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MonitorController',
            'form' => $form,
            'users' => $users,
        ]);
    }
}
