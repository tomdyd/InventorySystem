<?php

namespace App\Controller;

use App\Entity\Computer;
use App\Entity\Monitor;
use App\Entity\MouseAndKeyboard;
use App\Entity\Phone;
use App\Entity\Printer;
use App\Entity\Scanner;
use App\Entity\Tablet;
use App\Entity\Terminal;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ReadAllDevicesController extends AbstractController
{
    #[Route('/read/all/devices', name: 'app_read_all_devices')]
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $computer = $request->request->get('computer');
            $phone = $request->request->get('phone');
            $monitor = $request->request->get('monitor');
            $mouseAndKeyboards = $request->request->get('miceAndKeyboards');
            $printer = $request->request->get('printers');
            $scanner = $request->request->get('scanner');
            $tablet = $request->request->get('tablet');
            $terminal = $request->request->get('terminals');
        } else {
            $computer = $phone = $monitor = $mouseAndKeyboards = $printer = $scanner = $tablet = $terminal = true;
        }

        $notebooks = $phones = $monitors = $miceAndKeyboards = $printers = $scanners = $tablets = $terminals = [];

        if ($computer) {
            $notebooks = $entityManager->getRepository(Computer::class)->findAll();
        }
        if ($phone) {
            $phones = $entityManager->getRepository(Phone::class)->findAll();
        }
        if ($monitor) {
            $monitors = $entityManager->getRepository(Monitor::class)->findAll();
        }
        if ($mouseAndKeyboards) {
            $miceAndKeyboards = $entityManager->getRepository(MouseAndKeyboard::class)->findAll();
        }
        if ($printer) {
            $printers = $entityManager->getRepository(Printer::class)->findAll();
        }
        if($scanner){
            $scanners = $entityManager->getRepository(Scanner::class)->findAll();
        }
        if($tablet){
            $tablets = $entityManager->getRepository(Tablet::class)->findAll();
        }
        if($terminal){
            $terminals = $entityManager->getRepository(Terminal::class)->findAll();
        }

        return $this->render('read_all_devices/index.html.twig', [
            'controller_name' => 'ReadAllDevicesController',
            'notebooks' => $notebooks,
            'phones' => $phones,
            'monitors' => $monitors,
            'miceAndKeyboards' => $miceAndKeyboards,
            'printers' => $printers,
            'scanners' => $scanners,
            'tablets' => $tablets,
            'terminals' => $terminals,
        ]);
    }
}
