<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UpdateRolesTypeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UpdateRolesController extends AbstractController
{
    #[IsGranted("ROLE_SUPER_ADMIN")]
    #[Route('/update-roles', name: 'app_update_roles')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $form = $this->createForm(UpdateRolesTypeFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fullName = $form->get('name')->getData();

            $nameParts = explode(' ', $fullName, 2);
            $name = $nameParts[0];
            $surname = $nameParts[1];

            $user = $entityManager->getRepository(User::class)->findOneBy([
                'Name' => $name,
                'surname' => $surname
            ]);

            $user->setRoles($form->get('roles')->getData());

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_update_roles');
        }

        return $this->render('update_roles/index.html.twig', [
            'controller_name' => 'UpdateRolesController',
            'form' => $form,
            'users' => $users
        ]);
    }
}
