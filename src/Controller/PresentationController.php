<?php

namespace App\Controller;

use App\Entity\Presentation;
use App\Form\PresentationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentationController extends AbstractController
{
    /**
     * @Route("/backo/presentation/update-form", name="UpdatePresentationForm")
     */
    public function UpdateForm(): Response
    {
        $Doc = $this->getDoctrine()->getManager();
        $RepPresentation = $Doc->getRepository(Presentation::class);

        $Presentation = $RepPresentation->find(1);
        $Presentation->setTexte(str_replace("<br />", "", $Presentation->getTexte() ));

        $Form = $this->createForm(PresentationType::class, $Presentation, [
            'method' => 'POST',
            'action' => $this->generateUrl('UpdatePresentation')
        ]);



        return $this->render('presentation/Update.html.twig', [
            'Form' => $Form->createView()
        ]);
    }

    /**
     * @Route("/backo/presentation/update", name="UpdatePresentation")
     */
    public function Update(Request $Request): Response
    {

        $Form = $this->createForm(PresentationType::class);
        $Form->handleRequest($Request);

        if($Form->isSubmitted() && $Form->isValid() )
        {
            $Doc = $this->getDoctrine()->getManager();
            $RepPresentation = $Doc->getRepository(Presentation::class);
            $Presentation = $RepPresentation->find(1);

            $Presentation->setTexte($Form->get('Texte')->getData() );
            $Presentation->setUpdatedAt(new \DateTime());

            $Doc->flush();
            $this->addFlash("Notice", "Presentation bien modifié");
        }
        else
            $this->addFlash("Err", "Formulaire non valide..");

        return $this->render('presentation/Update.html.twig', [
            'Form' => $Form->createView()
        ]);
    }
}
