<?php

namespace App\Controller;

use App\Form\PersonFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class PersonController extends AbstractController
{
    #[Route('/person', name: 'app_person')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PersonFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $person = $form->getData();
            $entityManager->persist($person);
            $entityManager->flush();
        }

        return $this->render('person/index.html.twig', [
            'controller_name' => 'PersonController',
            'form' => $form
        ]);
    }
}
