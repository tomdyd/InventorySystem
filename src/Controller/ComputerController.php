<?php

namespace App\Controller;

use App\Entity\Computer;
use App\Entity\User;
use App\Form\ComputerFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class ComputerController extends AbstractController
{
    #[Route('/computer', name: 'app_computer')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $form = $this->createForm(ComputerFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
//            $fullName = $form->get('user')->getData();
//
//            $nameParts = explode(' ', $fullName, 2);
//            $name = $nameParts[0];
//            $surname = $nameParts[1];
//
//            $user = $entityManager->getRepository(User::class)->findOneBy([
//                'Name' => $name,
//                'surname' => $surname
//            ]);

            $userID = $form->get('user')->getData();
            $user = $entityManager->getRepository(User::class)->find($userID);

            $computer = $form->getData();

            $computer->setUser($user);

            $entityManager->persist($computer);

            $entityManager->flush();

            return $this->redirectToRoute('app_computer');
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'ComputerController',
            'form' => $form,
            'users' => $users,
        ]);
    }
}
