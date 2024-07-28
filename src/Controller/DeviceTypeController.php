<?php

namespace App\Controller;

use App\Form\DeviceFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DeviceTypeController extends AbstractController
{
    #[Route('/device-type', name: 'app_device_type')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DeviceFormType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $deviceType = $form->getData();
            $entityManager->persist($deviceType);
            $entityManager->flush();

            return $this->redirectToRoute('app_main');
        }

        return $this->render('device_type/index.html.twig', [
            'controller_name' => 'MainController',
            'form' => $form
        ]);
    }
}
