<?php

namespace App\Controller;

use App\Form\LocalizationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class LocalizationController extends AbstractController
{
    #[Route('/localization', name: 'app_localization')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LocalizationFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $localization = $form->getData();
            $entityManager->persist($localization);
            $entityManager->flush();
            return $this->redirectToRoute('app_localization');
        }

        return $this->render('localization/index.html.twig', [
            'controller_name' => 'LocalizationController',
            'form' => $form
        ]);
    }
}
