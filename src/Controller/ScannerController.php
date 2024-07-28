<?php

namespace App\Controller;

use App\Form\ScannerFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ScannerController extends AbstractController
{
    #[Route('/scanner', name: 'app_scanner')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ScannerFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $scanner = $form->getData();
            $entityManager->persist($scanner);
            $entityManager->flush();
            return $this->redirectToRoute('app_scanner');
        }


        return $this->render('main/index.html.twig', [
            'controller_name' => 'ScannerController',
            'form' => $form
        ]);
    }
}
