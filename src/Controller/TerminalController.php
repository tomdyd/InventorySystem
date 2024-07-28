<?php

namespace App\Controller;

use App\Form\TerminalFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class TerminalController extends AbstractController
{
    #[Route('/terminal', name: 'app_terminal')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TerminalFormType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $tablet = $form->getData();
            $entityManager->persist($tablet);
            $entityManager->flush();
            return $this->redirectToRoute('app_terminal');
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'TerminalController',
            'form' => $form
        ]);
    }
}
