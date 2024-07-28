<?php

namespace App\Controller;

use App\Entity\Computer;
use App\Entity\Monitor;
use App\Entity\MouseAndKeyboard;
use App\Entity\Phone;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class UserDevicesController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/user-devices/{id}', name: 'app_user_devices')]
    public function index($id, EntityManagerInterface $entityManager): Response
    {
        $notebooks = $entityManager->getRepository(Computer::class)->findBy(['user' => $id]);
        $user = $entityManager->getRepository(User::class)->find($id);
        $phones = $entityManager->getRepository(Phone::class)->findBy(['user' => $id]);
        $monitors = $entityManager->getRepository(Monitor::class)->findBy(['user' => $id]);
        $miceAndKeyboards = $entityManager->getRepository(MouseAndKeyboard::class)->findAll();

        return $this->render('user_devices/index.html.twig', [
            'controller_name' => 'UserDevicesController',
            'notebooks' => $notebooks,
            'user' => $user,
            'phones' => $phones,
            'monitors' => $monitors,
            'miceAndKeyboards' => $miceAndKeyboards,
        ]);
    }
}
