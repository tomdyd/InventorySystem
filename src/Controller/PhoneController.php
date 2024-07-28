<?php

namespace App\Controller;
use App\Entity\Person;
use App\Entity\User;
use App\Form\PhoneFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class PhoneController extends AbstractController
{
    #[Route('/phone', name: 'app_phone')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        $form = $this->createForm(PhoneFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $phone = $form->getData();
            $entityManager->persist($phone);
            $entityManager->flush();
            return $this->redirectToRoute('app_phone');
        }

        return $this->render('main/index.html.twig', [
            'controller_name' => 'PhoneController',
            'form' => $form,
            'users' => $users,

        ]);
    }
}
