<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortfolioCrudController extends AbstractController
{
    /**
     * @Route("/backo/AddProjet", name="AddProjet")
     */
    public function AddXP(Request $Request): Response
    {
        $Projet = new Projet();
        $Form = $this->createForm(ProjetFormType::class, $Projet);
        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() )
        {
            $Doc = $this->getDoctrine()->getManager();
            $Projet = $Form->getData();

            $Doc->persist($Projet);
            $Doc->flush();

            $this->addFlash('Notice', 'Projet bien ajouté..');
        }
        else
          $this->addFlash('Err', 'Formulaire non valide..');



        return $this->redirectToRoute('AddProjetForm');
    }
}
