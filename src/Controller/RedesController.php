<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RedesController extends AbstractController
{
    /**
     * @Route("/", name="redes")
     */
    public function index()
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');
        return $this->render('redes/index.html.twig', [
            'controller_name' => 'RedesController',
        ]);
    }

    /**
     * @Route("/servicio", name="servicio")
     */
    public function servicio()
    {
        return $this->render('redes/servicio.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about()
    {
        return $this->render('redes/about.html.twig');
    }
}
