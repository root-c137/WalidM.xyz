<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet/{id}", name="Projet")
     */
    public function index(Projet $id): Response
    {
        $Projet = $id;

        return $this->render('projet/index.html.twig', [
            'Projet' => $Projet
        ]);
    }
}

