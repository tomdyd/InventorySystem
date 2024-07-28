<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PrinterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class PrinterController extends AbstractController
{
    #[Route('/printer', name: 'app_printer')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PrinterFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $printer = $form->getData();
            $entityManager->persist($printer);
            $entityManager->flush();

            return $this->redirectToRoute('app_printer');
        }
        return $this->render('main/index.html.twig', [
            'controller_name' => 'PrinterController',
            'form' => $form,
        ]);
    }
}
