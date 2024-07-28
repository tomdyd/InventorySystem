<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\MouseAndKeyboardFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class MouseAndKeyboardController extends AbstractController
{
    #[Route('/mouse-and-keyboard', name: 'app_mouse_and_keyboard')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $form = $this->createForm(MouseAndKeyboardFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $moueOrKeyboard = $form->getData();
            $entityManager->persist($moueOrKeyboard);
            $entityManager->flush();
            return $this->redirectToRoute('app_mouse_and_keyboard');
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'MouseAndKeyboardController',
            'form' => $form,
            'users' => $users
        ]);
    }
}
